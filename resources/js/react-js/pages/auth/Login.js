import React, { useState } from "react";
import { useForm } from "../../utils/hooks/formHooks";
import { authValidator } from "../../utils/formValidation";
import { useSelector } from "react-redux";
import PasswordInput from "../../ui/PasswordInput";
import axios from "axios";
import Input from "../../ui/Input";
import { useNavigate } from "react-router-dom";
import { MdHome } from "react-icons/md";

function Login() {
    const [loading, setLoading] = useState(false);
    const initValues = {
        email: "",
        password: "",
    };

    const navigate = useNavigate();

    const errorResponse = useSelector((state) => state.auth.errors);

    const callbackFn = () => {
        setLoading(true);
        axios
            .post("/api/login", values)
            .then((res) => {
                setLoading(false);
                navigate("/dashboard");
            })
            .catch((err) => {
                setLoading(false);
                console.log(err);
            });
    };

    const { values, errors, handleChange, handleSubmit } = useForm(
        callbackFn,
        initValues,
        authValidator
    );

    return (
        <div className="auth-page">
            <div className="auth-left">
                <h1>Welcome to eCommunity</h1>
                <p>Login to enjoy the full benefits of community</p>
            </div>
            <div className="auth-right">
                <div className="container">
                    <header className="auth-header">
                        <h2>Login.</h2>
                        <div className="auth-header-btns">
                            <a href={"/"}>
                                <button title="Home">
                                    <MdHome />
                                </button>
                            </a>
                        </div>
                    </header>
                    <div className="auth-form">
                        {/* <h3>Let us know who you are</h3> */}
                        <form onSubmit={handleSubmit}>
                            <Input
                                name={"email"}
                                value={values.email}
                                handleChange={handleChange}
                                label={"Email Address"}
                                error={errors.email}
                                beError={
                                    errorResponse?.email &&
                                    errorResponse?.email[0]
                                }
                                clear={() => (errors.email = "")}
                            />
                            <PasswordInput
                                name={"password"}
                                value={values.password}
                                handleChange={handleChange}
                                label={"Password"}
                                error={errors.password}
                                beError={
                                    errorResponse.password &&
                                    errorResponse.password[0]
                                }
                                clear={() => (errors.password = "")}
                            />
                            <button className="cta-btn">
                                {loading ? "Logging in..." : "Login"}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Login;
