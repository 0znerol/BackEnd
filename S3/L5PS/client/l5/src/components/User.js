import { Grid } from "@mui/material";
import React, { useEffect, useState } from "react";
import { Link, useParams } from "react-router-dom";

export default function User({ userId }) {
  const params = useParams();
  const [users, setUsers] = useState(null);
  useEffect(() => {
    if (userId) {
      fetch(
        `http://localhost:6060/BackEnd/S3/L5PS/wordpress/index.php/wp-json/wp/v2/users/${userId}`
      )
        .then((response) => response.json())
        .then((json) => {
          setUsers([json]);
        });
    } else {
      fetch(
        "http://localhost:6060/BackEnd/S3/L5PS/wordpress/index.php/wp-json/wp/v2/users"
      )
        .then((response) => response.json())
        .then((json) => {
          setUsers(json);
        });
    }
  }, []);

  console.log(params.userId);
  if (!userId && users && !params.userId) {
    return users.map((user) => {
      console.log(user.name);
      return (
        <Grid container style={{ backgroundColor: "#222529" }}>
          <div>
            <h2 style={{ color: "white" }}>
              <Link
                to={`/user/${user.id}`}
                style={{ color: "white", textDecoration: "none" }}
              >
                {user.name}
              </Link>{" "}
              <img src={user.avatar_urls[24]} alt="user_img" />
            </h2>
          </div>
        </Grid>
      );
    });
  } else if ((params.userId && users) || (userId && users)) {
    const user = users.find(
      (user) => user.id == params.userId || user.id == userId
    );
    if (user) {
      console.log(user);
      return (
        <div>
          <p style={{ color: "white" }}>
            Author :{" "}
            <Link to={`/user/${user.id}`} style={{ color: "white" }}>
              {user.name}
            </Link>
          </p>
        </div>
      );
    } else {
      return <div>User not found</div>;
    }
  }
}
