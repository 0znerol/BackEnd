import express from "express";
import cors from "cors";
import open from "open";
import { spawn } from "child_process";
import mariadb from "mariadb";

// const app = express();
// const PORT = 7000;
// const users = [];

// app.use(
//   cors({
//     origin: ["http://localhost:3000"],
//     methods: "GET,HEAD,PUT,PATCH,POST,DELETE",
//     credentials: true,
//   })
// );

// const pool = mariadb.createPool({
//   host: "localhost",
//   user: "your_username",
//   password: "your_password",
//   database: "your_database",
//   connectionLimit: 5
// });

const phpServer = spawn("php", ["-S", "localhost:8000", "-t", "../client"]);

phpServer.stdout.on("data", (data) => {
  console.log(`PHP server: ${data}`);
});

// app.listen(PORT, () => {
//   console.log(`Node.js server is running on port: http://localhost:${PORT}`);
//   open("http://localhost:8000/index.php"); // Open the PHP file
// });
