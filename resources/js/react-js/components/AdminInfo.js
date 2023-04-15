import { useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { Link, useNavigate } from "react-router-dom";
import { authValidator } from "../utils/formValidation";
import axios from "axios";
import { useForm } from "../utils/hooks/formHooks";
import Input from "../ui/Input";
import { saveAdmin } from "../redux/authSlice";
import { MdArrowBackIos, MdHome } from "react-icons/md";

function AdminForm() {
    const [loading, setLoading] = useState(false);

    const admin = useSelector((state) => state.auth.admin);
    const communityName = useSelector((state) => state.auth.community.name);
    const errorResponse = useSelector((state) => state.auth.errors);

    const dispatch = useDispatch();
    const navigate = useNavigate();

    const initValues = {
        first_name: admin.first_name,
        last_name: admin.last_name,
        email: admin.email,
        phone_number: admin.phone_number,
    };

    const callbackFn = () => {
        setLoading(true);
        dispatch(saveAdmin(values));

        const valuesToSubmit = {
            ...values,
            avatar: sessionStorage.getItem("avatar") || null,
            name: communityName,
        };
        axios
            .post("/community/register", valuesToSubmit)
            .then((res) => {
                const result = res.data.payload.uid;
                setLoading(false);
                navigate(`/app/check-email`);
            })
            .catch((error) => {
                let response = error?.response?.data?.errors;
                setLoading(false);
                dispatch(backErrors(response));
            });
    };

    const { values, errors, handleChange, handleSubmit } = useForm(
        callbackFn,
        initValues,
        authValidator
    );

    return (
        <>
            <header className="auth-header">
                <h2>Sign up.</h2>
                <div className="auth-header-btns">
                    <Link to={-1}>
                        <button title="Back">
                            <MdArrowBackIos />
                        </button>
                    </Link>
                    <a href={"/"}>
                        <button title="Home">
                            <MdHome />
                        </button>
                    </a>
                </div>
            </header>
            <div className="auth-form">
                <h3>Let us know who you are</h3>
                <form onSubmit={handleSubmit}>
                    <Input
                        name={"first_name"}
                        value={values.first_name}
                        handleChange={handleChange}
                        label={"First Name"}
                        error={errors.first_name}
                        beError={
                            errorResponse?.first_name &&
                            errorResponse?.first_name[0]
                        }
                        clear={() => (errors.first_name = "")}
                    />
                    <Input
                        name={"last_name"}
                        value={values.last_name}
                        handleChange={handleChange}
                        label={"Last Name"}
                        error={errors.last_name}
                        beError={
                            errorResponse?.last_name &&
                            errorResponse?.last_name[0]
                        }
                        clear={() => (errors.last_name = "")}
                    />
                    <Input
                        name={"email"}
                        value={values.email}
                        handleChange={handleChange}
                        label={"Email Address"}
                        error={errors.email}
                        beError={
                            errorResponse?.email && errorResponse?.email[0]
                        }
                        clear={() => (errors.email = "")}
                    />
                    <Input
                        name={"phone_number"}
                        type="tel"
                        value={values.phone_number}
                        handleChange={handleChange}
                        label={"Phone Number"}
                        error={errors.phone_number}
                        beError={
                            errorResponse?.phone_number &&
                            errorResponse?.phone_number[0]
                        }
                        clear={() => (errors.phone_number = "")}
                    />
                    <button className="cta-btn">
                        {loading ? "Signing you up..." : "Sign up"}
                    </button>
                </form>
                <p className="attr">
                    Already have an account? <span>Log in</span>
                </p>
            </div>
        </>
    );
}

export default AdminForm;
