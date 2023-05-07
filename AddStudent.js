const mysql = require('mysql');

const connection = mysql.createConnection({
  server: 'jdbc:mysql://localhost:3306/projectdb?useSSL=false',
  host: '127.0.0.1',
  user: 'root',
  password: 'Chel@24sea99',
  database: 'projectdb'
});

// connect to the database
connection.connect((err) => {
    if (err) throw err;
    console.log('Connected to the database');
  });
  
  // handle GET request to retrieve data from the database
  app.get('/Student', (req, res) => {
    const sql = 'SELECT * FROM Student';
    connection.query(sql, (err, result) => {
      if (err) throw err;
      res.json(result);
    });
  });
  
  // handle POST request to add data to the database
  app.post('/Student', (req, res) => {
    const { F_NAME, L_NAME, SSN, ADDRESS, DOB, STUDENT_ID, RESIDENCE_ADDR  } = req.body;
    const sql = 'INSERT INTO Student (fname, lname, ssn, address, dob, stud_id, resAddress) VALUES (?, ?, ?, ?, ?, ?, ?)';
    connection.query(sql, [F_NAME, L_NAME, SSN, ADDRESS, DOB, STUDENT_ID, RESIDENCE_ADDR ], (err, result) => {
      if (err) throw err;
      res.json({ message: 'Student added successfully' });
    });
  });
  
  // handle PUT request to update data in the database
  app.put('/Student/:id', (req, res) => {
    const { F_NAME, L_NAME, SSN, ADDRESS, DOB, STUDENT_ID, RESIDENCE_ADDR } = req.body;
    const { id } = req.params;
    const sql = 'UPDATE students SET fname = ?, lname = ?, ssn = ?, address = ?, dob = ?, stud_id = ?, resAddress = ? WHERE id = ?';
    connection.query(sql, [F_NAME, L_NAME, SSN, ADDRESS, DOB, STUDENT_ID, RESIDENCE_ADDR], (err, result) => {
      if (err) throw err;
      res.json({ message: 'Student updated successfully' });
    });
  });
  
  // handle DELETE request to remove data from the database
  app.delete('/Student/:STUDENT_ID', (req, res) => {
    const { id } = req.params;
    const sql = 'DELETE FROM students WHERE STUDENT_ID = ?';
    connection.query(sql, [id], (err, result) => {
      if (err) throw err;
      res.json({ message: 'Student deleted successfully' });
    });
  });
  
  // start the server
  app.listen(3000, () => {
    console.log('Server started on port 3000');
  });