// import express
const express = require("express");
// membuat objek express
const app = express();

app.get("/", (req, res) => {
    res.send("Hello Express!!!");
});

app.get("/students", (req, res) => {
    res.send("Menampilkan semua students");
});
    
app.post("/students", (req, res) => {
    res.send("Menambahkan data student");
});
    
app.put("/students/:id", (req, res) => {
    const {id} = req.params;
    res.send(`Mengedit student ${id}`);
});
    
app.delete("/students/;id", (req, res) => {
    const {id} = req.params;
    res.send(`Mengedit student ${id}`);
});

// mendefinisikan port
app.listen(3000);