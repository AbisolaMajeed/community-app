import React, { useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { useNavigate } from "react-router-dom";
import { saveUserInfo } from "../redux/authSlice";
import DateInput from "../ui/DateInput";
import Input from "../ui/Input";
import { authValidator } from "../utils/formValidation";
import { useForm } from "../utils/hooks/formHooks";

function BasicInfoAuth() {
    const [loading, setLoading] = useState(false);

    const navigate = useNavigate();
    const dispatch = useDispatch();

    const beErrors = useSelector((state) => state.auth.errors);
    const user = useSelector((state) => state.auth.user.basic_info);

    const init_values = {
        title: user.title,
        first_name: user.first_name,
        last_name: user.last_name,
        other_names: user.other_names,
        date_of_birth: user.date_of_birth,
    };

    const callbackFn = () => {
        setLoading(true);
        setTimeout(() => {
            dispatch(saveUserInfo(values));
            setLoading(false);
            navigate("/app/user/register/contact-information"); 
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
                <h3>Welcome, Let's get to know you </h3>
                <form onSubmit={handleSubmit}>
                    <Input
                        name={"title"}
                        value={values.title}
                        handleChange={handleChange}
                        label={"Title"}
                        error={errors.title}
                        beError={beErrors.title && beErrors.title[0]}
                        clear={() => (errors.title = "")}
                    />
                    <Input
                        name={"last_name"}
                        value={values.last_name}
                        handleChange={handleChange}
                        label={"Last Name"}
                        error={errors.last_name}
                        beError={beErrors.last_name && beErrors.last_name[0]}
                        clear={() => (errors.last_name = "")}
                    />
                    <Input
                        name={"first_name"}
                        value={values.first_name}
                        handleChange={handleChange}
                        label={"First Name"}
                        error={errors.first_name}
                        beError={beErrors.first_name && beErrors.first_name[0]}
                        clear={() => (errors.first_name = "")}
                    />

                    <Input
                        name={"other_names"}
                        value={values.other_names}
                        handleChange={handleChange}
                        label={"Other Names"}
                        error={errors.other_names}
                        beError={
                            beErrors.other_names && beErrors.other_names[0]
                        }
                        clear={() => (errors.other_names = "")}
                    />
                    <DateInput
                        name={"date_of_birth"}
                        value={values.date_of_birth}
                        handleChange={handleChange}
                        label={"Date of Birth"}
                        error={errors.date_of_birth}
                        beError={
                            beErrors.date_of_birth && beErrors.date_of_birth[0]
                        }
                        clear={() => (errors.date_of_birth = "")}
                    />
                    <button className="cta-btn">
                        {loading ? "Please wait..." : "Continue"}
                    </button>
                </form>
            </div>
        </>
    );
}

export default BasicInfoAuth;
