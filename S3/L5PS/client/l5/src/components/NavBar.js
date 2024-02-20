import React from "react";
import AppBar from "@mui/material/AppBar";
import Box from "@mui/material/Box";
import Toolbar from "@mui/material/Toolbar";
import Typography from "@mui/material/Typography";
import Button from "@mui/material/Button";
import IconButton from "@mui/material/IconButton";
import MenuIcon from "@mui/icons-material/Menu";
import { Link } from "react-router-dom";
import { Grid } from "@mui/material";
export default function NavBar() {
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
          <Button color="inherit">Login</Button>
        </Toolbar>
      </AppBar>
    </Box>
  );
}
