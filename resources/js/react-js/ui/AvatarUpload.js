import React, { useRef, useState } from "react";
import { useDispatch } from "react-redux";
import { saveAvatar } from "../redux/authSlice";
import { getBase64 } from "../utils/helpers";

function AvatarUpload({ file, setFile, ctx }) {
    const [dragActive, setDragActive] = useState(false);
    const [image, setImage] = useState("");

    const fileUploadRef = useRef();

    const dispatch = useDispatch()

    const handleDrag = (e) => {
        e.preventDefault();
        e.stopPropagation();

        if (e.type === "dragenter" || e.type === "dragover") {
            setDragActive(true);
        } else if (e.type === "dragleave") {
            setDragActive(false);
        }
    };

    const handleDrop = (e) => {
        e.preventDefault();
        e.stopPropagation();
        setDragActive(false);

        const { files } = e.dataTransfer;
        getBase64(files[0]).then((res) => {
            setFile(files[0]);
            setImage(res);
            dispatch(saveAvatar(files[0]))
        });
    };

    const handleFileChange = (e) => {
        e.preventDefault();
        const { files } = e.target;

        getBase64(files[0]).then((res) => {
            setFile(files[0]);
            setImage(res);
            dispatch(saveAvatar(files[0]))
        });
    };

    const buttonHandler = () => {
        fileUploadRef.current.click();
    };

    return (
        <>
            <div className="file-upload-section">
                <input
                    type="file"
                    name="avatar"
                    id="avatar-upload"
                    className="file-upload"
                    onChange={handleFileChange}
                    accept="image/png, image/jpeg, image/jpg"
                    ref={fileUploadRef}
                />
                <label
                    htmlFor="avatar"
                    className={dragActive ? "drag-active" : ""}
                >
                    Drag & Drop or{" "}
                    <span>
                        <button type="button" onClick={buttonHandler}>
                            Browse Avatar
                        </button>
                    </span>
                </label>
                {dragActive && (
                    <div
                        className="drag-element"
                        onDragEnter={handleDrag}
                        onDragLeave={handleDrag}
                        onDragOver={handleDrag}
                        onDrop={handleDrop}
                    ></div>
                )}
            </div>
            {file && (
                <div className="uploaded-file">
                    <div className="preview-image">
                        <img
                            src={image}
                            alt="previewImage"
                            id="preview-image"
                        />
                    </div>
                    <p className="preview-text">{ctx}</p>
                </div>
            )}
        </>
    );
}

export default AvatarUpload;
