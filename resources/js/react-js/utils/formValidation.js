import validator from "validator";

export const authValidator = (values) => {
    let errors = {};

    if (values.hasOwnProperty("name") && validator.isEmpty(values.name)) {
        errors.name = "Community name must not be empty";
    }
    if (
        values.hasOwnProperty("first_name") &&
        validator.isEmpty(values.first_name)
    ) {
        errors.first_name = "First name must not be empty";
    }
    if (
        values.hasOwnProperty("last_name") &&
        validator.isEmpty(values.last_name)
    ) {
        errors.last_name = "Last name must not be empty";
    }
    if (values.hasOwnProperty("email") && validator.isEmpty(values.email)) {
        errors.email = "Email address must not be empty";
    }
    if (
        values.hasOwnProperty("phone_number") &&
        validator.isEmpty(values.phone_number)
    ) {
        errors.phone_number = "Phone number must not be empty";
    }
    if (
        values.hasOwnProperty("password") &&
        validator.isEmpty(values.password)
    ) {
        errors.password = "Password must not be empty";
    }
    if (
        values.hasOwnProperty("confirm_password") &&
        values.confirm_password.trim() === ""
    ) {
        errors.confirm_password = "Confirm password must not be empty";
    }

    if (
        Object.keys(errors).length === 0 &&
        values.hasOwnProperty("confirm_password") &&
        values.hasOwnProperty("password") &&
        values.password !== values.confirm_password
    ) {
        errors.confirm_password = "Passwords do not match!";
    }

    return errors;
};
