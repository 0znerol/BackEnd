import React, { useState, useEffect } from "react";
import { Grid } from "@material-ui/core";
import { Link } from "react-router-dom";
import GetImage from "./GetImage";
export default function SinglePost({ post, location }) {
  post.excerpt.rendered = post.excerpt.rendered.replace(
    /<a href=".*?".*?<\/a>/,
    "..."
  );
  console.log(location == "home");
  return (
    <Grid container key={post.id}>
      <Grid md={6} item style={{ paddingLeft: "2em" }}>
        <h2 style={{ color: "white" }}>{post.title.rendered}</h2>
        {location == "home" && (
          <div
            style={{ color: "white" }}
            dangerouslySetInnerHTML={{ __html: post.excerpt.rendered }}
          />
        )}
        {location == "post" && (
          <div
            style={{ color: "white" }}
            dangerouslySetInnerHTML={{ __html: post.content.rendered }}
          />
        )}

        <Link style={{ color: "white" }} to={`/post/${post.id}`}>
          Read More
        </Link>
        <p style={{ color: "white" }}>Posted on: {post.date}</p>
        <p style={{ color: "white" }}>Author: {post.author}</p>
      </Grid>
      <Grid md={6} item>
        <GetImage media={post.featured_media}></GetImage>
      </Grid>
    </Grid>
  );
}