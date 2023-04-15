import React, { useEffect, useState } from "react";
import { AiOutlineCaretDown } from "react-icons/ai";
import { useDispatch, useSelector } from "react-redux";
import { useNavigate } from "react-router-dom";
import { saveCommunityID, saveUserCommunityWorkflow } from "../redux/authSlice";
import { authValidator } from "../utils/formValidation";
import { useForm } from "../utils/hooks/formHooks";
import {
    useGetCommunity,
    useGetCountries,
} from "../utils/hooks/userHookActions";

function CommunityWorkflow() {
    const [loading, setLoading] = useState(false);
    const [enabled, setEnabled] = useState(true);
    const [step, setStep] = useState(0);

    const beErrors = useSelector((state) => state.auth.errors);
    const communityData = useSelector((state) => state.community.community);
    const countries = useSelector((state) => state.community.countries);

    const query = window.location.search;

    const community_id = query.split("=")[1];

    useGetCommunity(enabled, setEnabled, community_id);
    useGetCountries(enabled, setEnabled, community_id);

    const init_values = {
        country: "",
        entry: "",
    };

    const dispatch = useDispatch();
    const navigate = useNavigate();

    const callbackFn = () => {
        setLoading(true);
        setTimeout(() => {
            setLoading(false);
            navigate("/app/user/register/basic-information");
        }, 1500);
    };

    const { values, errors, handleChange, handleSubmit } = useForm(
        callbackFn,
        init_values,
        authValidator
    );

    const addWorkflow = (entry) => {
        dispatch(saveUserCommunityWorkflow({ ...values, workflow: entry }));
    };

    useEffect(() => {
        dispatch(saveCommunityID(community_id));
    }, [dispatch]);

    const filteredCountry = countries.filter(
        ({ country }) => country.id == values.country
    );

    const next = (entry) => {
        setStep((prev) => prev + 1);
        addWorkflow(entry);
    };

    return (
        <>
            <header className="auth-header">
                <h2>Sign up.</h2>
            </header>
            <div className="auth-form">
                <h3>{communityData?.name}</h3>
                <form>
                    <div className="input-group">
                        <select
                            name={"country"}
                            onChange={handleChange}
                            value={values.country}
                        >
                            <option value="">Choose country</option>
                            {countries.map(({ country }) => (
                                <option key={country.id} value={country.id}>
                                    {country.name}
                                </option>
                            ))}
                        </select>
                        <label htmlFor={"country"}>{"Country"}</label>
                        <AiOutlineCaretDown className="caret" />
                        <small className="error">
                            {errors.country ||
                                (beErrors.country && beErrors.country[0])}
                        </small>
                    </div>
                    {values.country !== "" &&
                        filteredCountry[0]?.workflows
                            .filter((_, index) => index === step)
                            .map((workflow) => (
                                <div key={workflow.id}>
                                    <div className="input-group">
                                        <select
                                            name={"entry"}
                                            onChange={handleChange}
                                            value={values.entry}
                                        >
                                            <option value="">
                                                Choose {workflow.name}
                                            </option>
                                            {workflow.workflowentries.map(
                                                (entry) => (
                                                    <option
                                                        key={entry.id}
                                                        value={entry.id}
                                                    >
                                                        {entry.name}
                                                    </option>
                                                )
                                            )}
                                        </select>
                                        <label htmlFor={workflow.name}>
                                            What {workflow.name} do you belong
                                            to?
                                        </label>
                                        <AiOutlineCaretDown className="caret" />
                                        <small className="error">
                                            {errors.country ||
                                                (beErrors.country &&
                                                    beErrors.country[0])}
                                        </small>
                                    </div>
                                    {step ===
                                    filteredCountry[0].workflows.length - 1 ? (
                                        <button
                                            type="button"
                                            className="cta-btn"
                                            onClick={() => {
                                                addWorkflow(workflow.id);
                                                handleSubmit();
                                            }}
                                        >
                                            {loading
                                                ? "Please wait..."
                                                : "Continue"}
                                        </button>
                                    ) : (
                                        <button
                                            type="button"
                                            onClick={() => next(workflow.id)}
                                            className="cta-btn"
                                        >
                                            Next
                                        </button>
                                    )}
                                </div>
                            ))}
                </form>
            </div>
        </>
    );
}

export default CommunityWorkflow;
