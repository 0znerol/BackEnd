import React from "react";
import { Grid } from "@material-ui/core";
import HomePost from "../components/HomePost";
import HomeUsers from "../components/HomeUsers";

export default function Homepage() {
  return (
    <Grid
      container
      spacing={2}
      justifyContent={"space-around"}

      // style={{ backgroundColor: "#222529" }}
    >
      <Grid
        item
        xs={12}
        sm={12}
        md={8}
        style={{
          // borderTop: "1px solid black",
          // borderLeft: "1px solid black",
          // borderRight: "1px solid black",
          borderRadius: 10,
          backgroundColor: "#524159",
          // margin: 1,
        }}
      >
        <h1 style={{ color: "#F3DBF9", margin: 0, marginBottom: 20 }}>Posts</h1>
        <Grid container spacing={2}>
          <HomePost />
        </Grid>
      </Grid>
      <Grid
        item
        xs={12}
        sm={12}
        md={3}
        style={{
          border: "1px solid black",
          backgroundColor: "#524159",
          borderRadius: 10,
        }}
      >
        <h1 style={{ color: "#F3DBF9", margin: 0, marginBottom: 20 }}>Users</h1>
        {/* <Grid container spacing={2} style={{ borderTop: "1px solid black" }}> */}
        <HomeUsers />
        {/* </Grid> */}
      </Grid>
    </Grid>
  );
}
