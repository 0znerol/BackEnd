import React, { useState, useEffect } from "react";

export default function GetImage({ media }) {
  const [image, setImage] = useState([]);
  const featuredImageUrl = `http://localhost:6060/BackEnd/S3/L5PS/wordpress/index.php/wp-json/wp/v2/media/${media}`;
  useEffect(() => {
    fetch(featuredImageUrl)
      .then((response) => response.json())
      .then((json) => {
        setImage(json.source_url);
      });
  }, [featuredImageUrl]);
  return (
    <div
      style={{
        display: "flex",
        justifyContent: "flex-end",
        alignItems: "center",
        margin: "10px",
        height: "100%",
      }}
    >
      <img src={image} alt="post_img" style={{ padding: 10, width: "70%" }} />
    </div>
  );
}
