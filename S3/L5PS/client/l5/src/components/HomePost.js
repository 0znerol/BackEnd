import React, { useState, useEffect } from "react";
import { Grid } from "@material-ui/core";
import SinglePost from "./SinglePost.js";
export default function HomePost() {
  const [posts, setPosts] = useState(null);

  useEffect(() => {
    fetch(
      "http://localhost:6060/BackEnd/S3/L5PS/wordpress/index.php/wp-json/wp/v2/posts"
    )
      .then((response) => response.json())
      .then((json) => {
        setPosts(json);
      });
  }, []);
  return (
    <Grid
      item
      xs={12}
      md={12}
      style={{ borderTop: "1px solid black", borderLeft: "1px solid black" }}
    >
      {posts &&
        posts.map((post) => (
          <SinglePost key={post.id} post={post} location={"home"} />
        ))}
    </Grid>
  );
}
