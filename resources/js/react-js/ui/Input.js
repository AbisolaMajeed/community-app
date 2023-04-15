import React from "react";

function Input({
    name,
    value,
    type,
    handleChange,
    label,
    error,
    beError,
    clear,
}) {

    return (
        <div className="input-group">
            <input
                type={type}
                name={name}
                value={value}
                onChange={handleChange}
                onBlur={clear}
            />
            <label htmlFor={name}>{label}</label>
            <small className="error">{error || beError}</small>
        </div>
    );
}

export default Input;
