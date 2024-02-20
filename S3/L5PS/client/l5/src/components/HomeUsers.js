import { Grid } from "@mui/material";
import React, { useState, useEffect } from "react";
import User from "./User";

export default function HomeUsers() {
  const [users, setUsers] = useState(null);

  useEffect(() => {
    fetch(
      "http://localhost:6060/BackEnd/S3/L5PS/wordpress/index.php/wp-json/wp/v2/users"
    )
      .then((response) => response.json())
      .then((json) => {
        console.log(json);
        setUsers(json);
      });
  }, []);
  return (
    users && (
      <Grid container>
        <User allUsers={users} location={"home"} />
      </Grid>
    )
  );
}
