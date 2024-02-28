import { Grid } from "@mui/material";
import React, { useState, useEffect } from "react";
import { useParams } from "react-router-dom";

export default function SearchPage() {
  const params = useParams();
  const [searchResults, setSearchResults] = useState([]);
  useEffect(() => {
    fetch(
      "http://localhost:6060/BackEnd/S3/L5PS/wordpress/index.php/wp-json/wp/v2/posts"
    )
      .then((response) => response.json())
      .then((json) => {
        setSearchResults(json);
      });
  }, []);
  console.log(params.searchValue);
  return (
    <Grid container>
      {
        /* params.SearchValue && */
        searchResults
          .filter((post) =>
            post.title.rendered.toLowerCase().includes(params.searchValue)
          )
          .map((post) => (
            <Grid item xs={12} md={12} style={{ borderTop: "1px solid black" }}>
              <h1>{post.title.rendered}</h1>
              <p>{post.content.rendered}</p>
            </Grid>
          ))
      }
    </Grid>
  );
}
