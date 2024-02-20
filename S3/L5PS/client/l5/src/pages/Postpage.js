import { Grid } from "@mui/material";
import React, { useState, useEffect } from "react";
import { useParams } from "react-router-dom";
import GetImage from "../components/GetImage";
import SinglePost from "../components/SinglePost";

export default function Postpage() {
  const [post, setPost] = useState(null);
  const params = useParams();
  useEffect(() => {
    fetch(
      `http://localhost:6060/BackEnd/S3/L5PS/wordpress/index.php/wp-json/wp/v2/posts/${params.postid}`
    )
      .then((response) => response.json())
      .then((json) => {
        setPost(json);
      });
  }, [params.postid]);

  return (
    post && (
      <Grid container key={post.id}>
        <SinglePost post={post} location={"post"} />
      </Grid>
    )
  );
}
