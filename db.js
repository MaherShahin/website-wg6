// Connect to the database
const mysql = require("mysql2");
const connection = mysql.createConnection({
  host: "sql7.freemysqlhosting.net",
  user: "sql7587471",
  password: "Pskf2GAHbr",
  database: "sql7587471"
});

// Function to add a player to the database
function addPlayer(formData) {
  // Validate the form data
  console.log(req.body)
  const firstName = req.body.firstName;
  const lastName = req.body.lastName;
  const nickname = req.body.nickname;
  const phoneNumber = req.body.phoneNumber;

  console.log("firstName: " + firstName);
  console.log("lastName: " + lastName);
  console.log("nickname: " + nickname);
  console.log("phoneNumber: " + phoneNumber);


  if (phoneNumber == null) {
    phoneNumber = "";
  }

  if (nickname == null) {
    nickname = "";
  }

  // Validate the form data
  if (!firstName || !lastName) {
    // Return an error if the first or last name is missing
    return res.status(400).json({ error: "First and last name are required" });
  }

  // Insert the player into the database
  connection.query(
    "INSERT INTO players (first_name, last_name, nickname, phone_number) VALUES (?, ?, ?, ?)",
    [formData.firstName, formData.lastName, formData.nickname, formData.phoneNumber],
    (error, results) => {
      if (error) {
        throw new Error(error.message);
      }
      // Return the player id if the player was inserted successfully
      return results.insertId;
    }
  );
}

