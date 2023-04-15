import React, { useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { useNavigate } from "react-router-dom";
import { saveUserOtherInfo } from "../redux/authSlice";
import Input from "../ui/Input";
import { authValidator } from "../utils/formValidation";
import { useForm } from "../utils/hooks/formHooks";

function OtherInfoAuth() {
    const [loading, setLoading] = useState(false);

    const navigate = useNavigate();
    const dispatch = useDispatch();

    const beErrors = useSelector((state) => state.auth.errors);
    const user = useSelector((state) => state.auth.user.others);

    const init_values = {
        occupation: user.occupation,
        education: user.education,
    };

    const callbackFn = () => {
        setLoading(true);
        setTimeout(() => {
            dispatch(saveUserOtherInfo(values));
            setLoading(false);
            navigate("/app/user/register/signup");
        }, 1500);
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
                <h3>A few more information...</h3>
                <form onSubmit={handleSubmit}>
                    <Input
                        name={"occupation"}
                        value={values.occupation}
                        handleChange={handleChange}
                        label={"Occupation"}
                        error={errors.occupation}
                        beError={beErrors.occupation && beErrors.occupation[0]}
                        clear={() => (errors.occupation = "")}
                    />

                    <Input
                        name={"education"}
                        value={values.education}
                        handleChange={handleChange}
                        label={"Education"}
                        error={errors.education}
                        beError={beErrors.education && beErrors.education[0]}
                        clear={() => (errors.education = "")}
                    />
                    <button className="cta-btn">
                        {loading ? "Please wait..." : "Continue"}
                    </button>
                </form>
            </div>
        </>
    );
}

export default OtherInfoAuth;
