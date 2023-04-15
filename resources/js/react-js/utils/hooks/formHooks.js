import { useState } from "react";

function useForm(cb, initState = {}, validate) {
    const [values, setValues] = useState(initState);
    const [errors, setErrors] = useState({});

    const handleChange = (e) => {
        setValues((prev) => ({ ...prev, [e?.target.name]: e?.target.value }));
    };

    const handleSubmit = (e, x) => {
        if (e) e.preventDefault();

        const getErrors = validate(values);

        if (Object.keys(getErrors).length === 0) {
            cb(x);
            setErrors(getErrors);
        } else {
            setErrors(getErrors);
        }
    };

    function clearForm() {
        setValues((prev) => {
            let rep_obj = { ...prev };
            for (var key of Object.keys(rep_obj)) {
                rep_obj[key] = initState[key];
            }
            return rep_obj;
        });
    }
    return { handleChange, handleSubmit, errors, values, clearForm };
}

export { useForm };
