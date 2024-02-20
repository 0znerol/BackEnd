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
    //home sideBar
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
            <h2 style={{ color: "#F3DBF9", fontSize: "1em" }}>
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
            <img
              src={user.avatar_urls[48]}
              alt="user_img"
              style={{ borderRadius: "50%" }}
            />
          </div>
        </Grid>
      );
    });
  } else if (userId && users) {
    //home Post
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
  } else if (params.userId && users) {
    //user Page
    const user = users.find((user) => user.id == params.userId);
    if (user) {
      console.log(user);
      return (
        <Grid
          container
          style={{
            display: "flex",
            borderRadius: 10,
            backgroundColor: "#524159",
          }}
        >
          <Grid item md={6} style={{ flexDirection: "column" }}>
            <h1 style={{ color: "#F3DBF9" }}>{user.name}</h1>
            <p style={{ fontSize: "1.5em", color: "#F3DBF9" }}>
              {user.description}
            </p>
          </Grid>
          <Grid
            item
            md={6}
            style={{
              display: "flex",
              flexDirection: "column",
            }}
          >
            <img
              src={user.avatar_urls[96]}
              alt="user_img"
              style={{ alignSelf: "end", margin: "10px", borderRadius: "50%" }}
            />
          </Grid>
        </Grid>
      );
    }
  }
}
