import { useState } from "react";
import { MdHome } from "react-icons/md";
import { useDispatch, useSelector } from "react-redux";
import { useNavigate } from "react-router-dom";
import { saveCommunity } from "../redux/authSlice";
import AvatarUpload from "../ui/AvatarUpload";
import Input from "../ui/Input";
import { authValidator } from "../utils/formValidation";
import { useForm } from "../utils/hooks/formHooks";

function CommunityForm() {
    const [loading, setLoading] = useState(false);
    const [file, setFile] = useState(null);

    const communityName = useSelector((state) => state.auth.community.name);
    const beErrors = useSelector((state) => state.auth.errors);

    const init_values = {
        name: communityName,
    };

    const dispatch = useDispatch();
    const navigate = useNavigate();

    const cb = () => {
        setLoading(true);

        setTimeout(() => {
            sessionStorage.setItem("community_name", values.name);

            dispatch(saveCommunity(values.name));
            navigate("create-account");
            setLoading(false);
        }, 1500);
    };

    const { values, errors, handleChange, handleSubmit } = useForm(
        cb,
        init_values,
        authValidator
    );

    return (
        <>
            <header className="auth-header">
                <h2>Sign up.</h2>
            </header>
            <div className="auth-form">
                <h3>Create your community</h3>
                <form onSubmit={handleSubmit}>
                    <Input
                        name={"name"}
                        value={values.name}
                        handleChange={handleChange}
                        label={"Community Name"}
                        error={errors.name}
                        beError={beErrors.name && beErrors.name[0]}
                        clear={() => (errors.name = "")}
                    />
                    <AvatarUpload
                        file={file}
                        setFile={setFile}
                        ctx={"Community Logo"}
                    />
                    <button className="cta-btn">
                        {loading ? "Please wait..." : "Continue"}
                    </button>
                </form>
                <p className="attr">
                    Already have an account? <span>Log in</span>
                </p>
            </div>
        </>
    );
}

export default CommunityForm;
