import React, { useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { useNavigate } from "react-router-dom";
import { saveUserContact } from "../redux/authSlice";
import DateInput from "../ui/DateInput";
import Input from "../ui/Input";
import { authValidator } from "../utils/formValidation";
import { useForm } from "../utils/hooks/formHooks";

function ContactInfoAuth() {
    const [loading, setLoading] = useState(false);

    const navigate = useNavigate();
    const dispatch = useDispatch();

    const beErrors = useSelector((state) => state.auth.errors);
    const user = useSelector((state) => state.auth.user.contact);

    const init_values = {
        phone_number: user.phone_number,
        home_address: user.home_address,
        closest_landmark: user.closest_landmark,
        date_arrived: user.date_arrived,
    };

    const callbackFn = () => {
        setLoading(true);
        setTimeout(() => {
            dispatch(saveUserContact(values));
            navigate("/app/user/register/upload-profile-avatar");
            setLoading(false);
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
                <h3>Kindly fill us in with your contact information </h3>
                <form onSubmit={handleSubmit}>
                    <Input
                        name={"phone_number"}
                        value={values.phone_number}
                        handleChange={handleChange}
                        label={"Phone Number"}
                        type={"number"}
                        error={errors.phone_number}
                        beError={
                            beErrors.phone_number && beErrors.phone_number[0]
                        }
                        clear={() => (errors.phone_number = "")}
                    />

                    <Input
                        name={"home_address"}
                        value={values.home_address}
                        handleChange={handleChange}
                        label={"Home Address"}
                        error={errors.home_address}
                        beError={
                            beErrors.home_address && beErrors.home_address[0]
                        }
                        clear={() => (errors.home_address = "")}
                    />

                    <Input
                        name={"closest_landmark"}
                        value={values.closest_landmark}
                        handleChange={handleChange}
                        label={"Closest Landmark"}
                        error={errors.closest_landmark}
                        beError={
                            beErrors.closest_landmark &&
                            beErrors.closest_landmark[0]
                        }
                        clear={() => (errors.closest_landmark = "")}
                    />
                    <DateInput
                        name={"date_arrived"}
                        value={values.date_arrived}
                        handleChange={handleChange}
                        label={"Arrival Date"}
                        error={errors.date_arrived}
                        beError={
                            beErrors.date_arrived && beErrors.date_arrived[0]
                        }
                        clear={() => (errors.date_arrived = "")}
                    />
                    <button className="cta-btn">
                        {loading ? "Please wait..." : "Continue"}
                    </button>
                </form>
            </div>
        </>
    );
}

export default ContactInfoAuth;
