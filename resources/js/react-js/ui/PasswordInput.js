import React, { useState } from "react";
import { AiOutlineEyeInvisible, AiOutlineEye } from "react-icons/ai";

function PasswordInput({ name, value, handleChange, label, error, beError, clear }) {
    const [passwordType, setPasswordType] = useState("password");
    const [reveal, setReveal] = useState(false);

    const togglePassword = () => {
        if (passwordType === "password") {
            setReveal(true);
            setPasswordType("text");
        } else {
            setReveal(false);
            setPasswordType("password");
        }
    };

    return (
        <div className="input-group">
            <input
                type={passwordType}
                name={name}
                className="password-input"
                value={value}
                onChange={handleChange}
                onFocus={() => clear()}
            />
            <label htmlFor="password" title="Password">
                {label}
            </label>
            <button
                type="button"
                className="reveal-pw"
                onClick={togglePassword}
            >
                {reveal ? <AiOutlineEye /> : <AiOutlineEyeInvisible />}
            </button>
            <small className="error">{error || beError}</small>
        </div>
    );
}

export default PasswordInput;
