import React from "react";
import illustration from "../assets/3675555.jpg";

function CheckEmail() {
    return (
            <div className="check-email">
                <img src={illustration} alt="" width={500} />
                <p>Kindly check your email to confirm your account</p>
            </div>
        
    );
}

export default CheckEmail;
