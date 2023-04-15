import { useState } from "react";
import { MdArrowBackIos, MdHome } from "react-icons/md";
import { Link, useNavigate } from "react-router-dom";
import AvatarUpload from "../ui/AvatarUpload";

function UserProfileAvatar() {
    const [loading, setLoading] = useState(false);
    const [file, setFile] = useState(null);

    const navigate = useNavigate();

    const handleSubmit = (e) => {
        e.preventDefault();
        setLoading(true);
        setTimeout(() => {
            setLoading(false);
            navigate("/app/user/register/other-information");
        }, 1500);
    };

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
                <h3>Let's set a profile picture</h3>
                <form onSubmit={handleSubmit}>
                    <AvatarUpload
                        file={file}
                        setFile={setFile}
                        ctx={"Profile Avatar"}
                    />
                    <button className="cta-btn">
                        {loading ? "Please wait..." : "Continue"}
                    </button>
                </form>
            </div>
        </>
    );
}

export default UserProfileAvatar;
