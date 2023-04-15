import React, { useState } from "react";
import axios from "axios";
import { useDispatch, useSelector } from "react-redux";
import { Link, useNavigate } from "react-router-dom";
import { backErrors, saveUserAuth } from "../redux/authSlice";
import Input from "../ui/Input";
import PasswordInput from "../ui/PasswordInput";
import { authValidator } from "../utils/formValidation";
import { useForm } from "../utils/hooks/formHooks";
import { MdArrowBackIos, MdHome } from "react-icons/md";

function UserAuthDetails() {
    const [loading, setLoading] = useState(false);
    const navigate = useNavigate();
    const dispatch = useDispatch();

    const beErrors = useSelector((state) => state.auth.errors);
    const user = useSelector((state) => state.auth.user.auth);
    const userData = useSelector((state) => state.auth.user);
    const communityID = useSelector((state) => state.auth.community);
    const workflow = useSelector((state) => state.auth.user.workflow);

    const init_values = {
        email: user.email,
        password: user.password,
        confirm_password: "",
    };

    const callbackFn = () => {
        setLoading(true);
        dispatch(
            saveUserAuth({ email: values.email, password: values.password })
        );

        const data = {
            ...userData.basic_info,
            ...userData.contact,
            ...userData.others,
            community_id: communityID.community_id,
            email: values.email || user.email,
            password: values.password || user.password,
            workflow: workflow.map((wf) => ({
                community_workflow_id: Number(wf.workflow),
                community_workflow_entry_id: Number(wf.entry),
            })),
        };

        axios
            .post("/api/register", data)
            .then((res) => {
                setLoading(false);
                navigate(`/app/login`);
            })
            .catch((error) => {
                let response = error?.response?.data?.errors;
                setLoading(false);
                dispatch(backErrors(response));
            });
    };

    const { values, errors, handleChange, handleSubmit } = useForm(
        callbackFn,
        init_values,
        authValidator
    );

    return (
        <>
            <header className="auth-header">
                <h2>Sign up.</h2>
            </header>
            <div className="auth-form">
                <h3>Finally let's get your credentials </h3>
                <form onSubmit={handleSubmit}>
                    <Input
                        name={"email"}
                        value={values.email}
                        handleChange={handleChange}
                        label={"Email Address"}
                        error={errors.email}
                        beError={beErrors?.email && beErrors?.email[0]}
                        clear={() => (errors.email = "")}
                    />
                    <PasswordInput
                        name={"password"}
                        value={values.password}
                        handleChange={handleChange}
                        label={"Password"}
                        error={errors.password}
                        beError={beErrors?.password && beErrors?.password[0]}
                        clear={() => (errors.password = "")}
                    />
                    <PasswordInput
                        name={"confirm_password"}
                        value={values.confirm_password}
                        handleChange={handleChange}
                        label={"Confirm Password"}
                        error={errors.confirm_password}
                        clear={() => (errors.confirm_password = "")}
                    />

                    <button className="cta-btn">
                        {loading ? "Signing you up..." : "Sign up"}
                    </button>
                </form>
            </div>
        </>
    );
}

export default UserAuthDetails;
