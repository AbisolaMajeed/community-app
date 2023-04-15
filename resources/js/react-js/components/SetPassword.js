import axios from "axios";
import { useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import { authValidator } from "../utils/formValidation";
import { useForm } from "../utils/hooks/formHooks";
import PasswordInput from "../ui/PasswordInput";
import { useSelector } from "react-redux";

function SetPassword() {
    const { uid } = useParams();
    const [loading, setLoading] = useState(false);

    const navigate = useNavigate();

    const initValues = {
        password: "",
        confirm_password: "",
    };

    const errorResponse = useSelector((state) => state.auth.errors);

    const cb = () => {
        setLoading(true);
        axios
            .post(`/community/set-password/${uid}`, values)
            .then((res) => {
                console.log(res.data);
                setLoading(false);
                navigate("/app/login");
            })
            .catch((err) => {
                console.log(err);
                setLoading(false);
            });
    };

    const { values, errors, handleChange, handleSubmit } = useForm(
        cb,
        initValues,
        authValidator
    );

    return (
        <div className="auth-form">
            <h3>Set your password</h3>
            <form onSubmit={handleSubmit}>
                <PasswordInput
                    name={"password"}
                    value={values.password}
                    handleChange={handleChange}
                    label={"Password"}
                    error={errors.password}
                    beError={
                        errorResponse.password && errorResponse.password[0]
                    }
                />
                <PasswordInput
                    name={"confirm_password"}
                    value={values.confirm_password}
                    handleChange={handleChange}
                    label={"Confirm Password"}
                    error={errors.confirm_password}
                    beError={
                        errorResponse.confirm_password &&
                        errorResponse.confirm_password[0]
                    }
                />

                <button className="cta-btn">
                    {loading ? "Processing..." : "Set Password"}
                </button>
            </form>
        </div>
    );
}

export default SetPassword;
