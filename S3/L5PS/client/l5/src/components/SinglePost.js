import React, { useState, useEffect } from "react";
import { Grid } from "@material-ui/core";
import { Link } from "react-router-dom";
import GetImage from "./GetImage";
import User from "./User";
import { useParams } from "react-router-dom";
export default function SinglePost({ post, location }) {
  const params = useParams();
  post.excerpt.rendered = post.excerpt.rendered.replace(
    /<a href=".*?".*?<\/a>/,
    "..."
  );
  return (
    <Grid container key={post.id} style={{ borderBottom: "1px solid black" }}>
      <Grid md={6} item style={{ paddingLeft: "2em" }}>
        {location == "home" && (
          <>
            <Link style={{ color: "white" }} to={`/post/${post.id}`}>
              <h2 style={{ color: "white" }}>{post.title.rendered}</h2>
            </Link>
            <div
              style={{ color: "white" }}
              dangerouslySetInnerHTML={{ __html: post.excerpt.rendered }}
            />
            <Link style={{ color: "white" }} to={`/post/${post.id}`}>
              Read More
            </Link>
          </>
        )}
        {location == "post" && (
          <>
            <h2 style={{ color: "white" }}>{post.title.rendered}</h2>

            <div
              style={{ color: "white" }}
              dangerouslySetInnerHTML={{ __html: post.content.rendered }}
            />
          </>
        )}
        {}

        <p style={{ color: "white" }}>Posted on: {post.date.slice(0, 10)}</p>

        <User userId={post.author}></User>
      </Grid>
      <Grid md={6} item>
        <GetImage media={post.featured_media}></GetImage>
      </Grid>
    </Grid>
  );
}
