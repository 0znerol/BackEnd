import React from "react";
import { Grid } from "@material-ui/core";
import HomePost from "../components/HomePost";
import HomeUsers from "../components/HomeUsers";

export default function Homepage() {
  return (
    <Grid
      container
      spacing={2}
      justifyContent={"space-between"}
      style={{ backgroundColor: "#222529" }}
    >
      <Grid item xs={12} md={9} style={{ border: "1px solid black" }}>
        <h1 style={{ color: "#F3DBF9", margin: 0, marginBottom: 20 }}>Posts</h1>
        <Grid container spacing={2}>
          <HomePost />
        </Grid>
      </Grid>
      <Grid item xs={12} md={3} style={{ border: "1px solid black" }}>
        <h1 style={{ color: "#F3DBF9", margin: 0, marginBottom: 20 }}>Users</h1>
        <HomeUsers />
      </Grid>
    </Grid>
  );
}
