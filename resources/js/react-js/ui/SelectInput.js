import React from "react";
import { AiOutlineCaretDown } from "react-icons/ai";

function SelectInput({
    name,
    value,
    handleChange,
    options,
    label,
    error,
    beError,
    disabled
}) {
    return (
        <div className="input-group">
            <select name={name} onChange={handleChange} value={value} disabled={disabled}>
                <option value="">Choose {name}</option>
                {options &&
                    options.map((option) => (
                        <option key={option.id} value={option.id}>
                            {option.name || option.id}
                        </option>
                    ))}
            </select>
            <label htmlFor={name}>{label}</label>
            <AiOutlineCaretDown className="caret" />
            <small className="error">{error || beError}</small>
        </div>
    );
}

export default SelectInput;
