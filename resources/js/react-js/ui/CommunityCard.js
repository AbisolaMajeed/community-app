import React from "react";
import { useNavigate } from "react-router-dom";

function CommunityCard({ id, image, name, users }) {
    const navigate = useNavigate();

    const handleRoute = (id) => {

        navigate(`/app/user/register?communityID=${id}`);
    };

    return (
        <div className="community-card">
            <div className="community-image">
                <img
                    src={
                        image ||
                        "https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                    }
                    alt={name}
                />
            </div>
            <div className="community-card-content">
                <h3 className="community-name">{name}</h3>
                <div>
                    <p>Active Users: {users || 0}</p>
                    <button onClick={() => handleRoute(id)}>
                        Join Community
                    </button>
                </div>
            </div>
        </div>
    );
}

export default CommunityCard;
