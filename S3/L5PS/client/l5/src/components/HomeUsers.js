import { Grid } from "@mui/material";
import React, { useState, useEffect } from "react";
import User from "./User";

export default function HomeUsers() {
  return (
    <Grid container>
      <User userId={null} />
    </Grid>
  );
}
