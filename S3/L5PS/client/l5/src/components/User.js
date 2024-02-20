import { Grid } from "@mui/material";
import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom";

export default function User({ allUsers, location }) {
  const params = useParams();

  const [users, setUsers] = useState(null);
  console.log(users);
  useEffect(() => {
    setUsers(allUsers);
  }, [params]);
  if (allUsers && location == "home") {
    return allUsers.map((user) => {
      //   console.log(user.name);
      return (
        <Grid container style={{ backgroundColor: "#222529" }}>
          <div>
            <h2 style={{color:"white"}}>
              {user.name} <img src={user.avatar_urls[24]} alt="user_img" />
            </h2>
          </div>
        </Grid>
      );
    });
  } else if (allUsers && location == "user") {
    const user = allUsers.find((user) => user.id == params.id);
    return (
      <div>
        <h2>{user.name}</h2>
        <p>{user.email}</p>
      </div>
    );
  }
}
