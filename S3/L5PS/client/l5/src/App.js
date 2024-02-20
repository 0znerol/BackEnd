import logo from "./logo.svg";
import "./App.css";
import Grid from "@mui/material/Grid";
import Homepage from "./pages/Homepage";
import NavBar from "./components/NavBar";
import { BrowserRouter as Router, Routes, Route, Link } from "react-router-dom";
import Postpage from "./pages/Postpage";
import User from "./components/User";
function App() {
  return (
    <Router>
      <Grid
        container
        style={{
          backgroundColor: "#1B1C1E",
          // overflowX: "hidden",
          width: "100vw",
          minHeight: "100vh",
          padding: 10,
        }}
      >
        <Grid item xs={12}>
          <NavBar />
        </Grid>
        <Grid item xs={12} style={{ marginTop: "1em", padding: 10 }}>
          <Routes>
            <Route path="/post/:postid" element={<Postpage />} />
            <Route path="/user/:userId" element={<User />} />
            {/* <Route path="/user">
              <Users />
            </Route> */}
            <Route path="/" element={<Homepage />} />
          </Routes>
        </Grid>
      </Grid>
    </Router>
  );
}

export default App;
