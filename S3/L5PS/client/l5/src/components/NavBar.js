import React from "react";
import {
  IconButton,
  Grid,
  TextField,
  Button,
  Toolbar,
  AppBar,
  Box,
} from "@mui/material";
import MenuIcon from "@mui/icons-material/Menu";
import { Link, useNavigate } from "react-router-dom";
export default function NavBar() {
  const navigate = useNavigate();
  const handleSubmit = (e) => {
    e.preventDefault();
    const searchValue = e.target.search.value;
    console.log(e);
    navigate(`/search/${searchValue}`);
  };
  return (
    <Box sx={{ flexGrow: 1, border: "1px #524159 solid" }}>
      <AppBar position="static">
        <Toolbar style={{ backgroundColor: "black" }}>
          <IconButton
            size="large"
            edge="start"
            color="inherit"
            aria-label="menu"
            sx={{ mr: 2 }}
          >
            <MenuIcon />
          </IconButton>
          <Grid container>
            <Link
              to="/"
              style={{ textDecoration: "none", color: "inherit", fontSize: 25 }}
            >
              Home
            </Link>
          </Grid>
          <form
            onSubmit={(e) => {
              handleSubmit(e);
            }}
          >
            <input name="search" type="text" />
          </form>
          <TextField
            id="outlined-basic"
            label="Search"
            variant="outlined"
            // backgroundColor="white"
            style={{
              backgroundColor: "#524159",
              margin: "0.5em",
              borderRadius: 5,
            }}
            onSubmit={(e) => handleSubmit(e)}
          />
        </Toolbar>
      </AppBar>
    </Box>
  );
}
