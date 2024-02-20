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
    return users.map((user, index) => {
      console.log(user.name);
      return (
        <Grid key={index} container>
          <div
            style={{
              display: "flex",
              justifyContent: "space-between",
              borderBottom: "1px solid black",
              width: "100%",
              marginLeft: "2em",
              marginRight: "2em",
            }}
          >
            <h2 style={{ color: "#F3DBF9" }}>
              <Link
                to={`/user/${user.id}`}
                style={{
                  color: "#F3DBF9",
                  textDecoration: "none",
                  margin: "auto",
                }}
              >
                {user.name}
              </Link>{" "}
            </h2>
            <img src={user.avatar_urls[48]} alt="user_img" style={{}} />
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
          <p style={{ color: "#F3DBF9" }}>
            Author :{" "}
            <Link to={`/user/${user.id}`} style={{ color: "#F3DBF9" }}>
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
