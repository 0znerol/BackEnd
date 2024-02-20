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
    <Grid
      container
      key={post.id}
      style={{
        borderBottom: "1px solid black",
        backgroundColor: "#524159",
        ...(location == "post" && {
          borderRadius: 10,
          borderTop: "1px solid black",
        }),
      }}
    >
      <Grid
        md={6}
        item
        style={{
          paddingLeft: "2em",
          display: "flex",
          flexDirection: "column",
          justifyContent: "space-between",
        }}
      >
        {location == "home" && (
          <>
            <Link style={{ color: "#F3DBF9" }} to={`/post/${post.id}`}>
              <h2 style={{ color: "#F3DBF9" }}>{post.title.rendered}</h2>
            </Link>
            <div
              style={{ color: "#F3DBF9" }}
              dangerouslySetInnerHTML={{ __html: post.excerpt.rendered }}
            />
            <Link style={{ color: "#F3DBF9" }} to={`/post/${post.id}`}>
              Read More
            </Link>
          </>
        )}
        {location == "post" && (
          <Grid container spacing={2}>
            <h1 style={{ color: "#F3DBF9", fontSize: "3em" }}>
              {post.title.rendered}
            </h1>

            <div
              style={{ color: "#F3DBF9", fontSize: "1.5em" }}
              dangerouslySetInnerHTML={{ __html: post.content.rendered }}
            />
          </Grid>
        )}
        {}

        <p style={{ color: "#F3DBF9" }}>Posted on: {post.date.slice(0, 10)}</p>

        <User userId={post.author}></User>
      </Grid>
      <Grid md={6} item>
        <GetImage media={post.featured_media}></GetImage>
      </Grid>
    </Grid>
  );
}
