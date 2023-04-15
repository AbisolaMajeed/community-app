import React from "react";
import { MdOutlineCalendarMonth } from "react-icons/md";

function DateInput({
    name,
    value,
    handleChange,
    label,
    error,
    beError,
    clear,
}) {
    return (
        <div className="input-group">
            <span className="date">
                <span>
                    <MdOutlineCalendarMonth className="calendar-icon" />
                </span>
                <input
                    type="date"
                    name={name}
                    value={value}
                    onChange={handleChange}
                    onBlur={clear}
                />
                <label htmlFor={name}>{label}</label>
            </span>

            <small className="error">{error || beError}</small>
        </div>
    );
}

export default DateInput;
