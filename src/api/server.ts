import express from 'express'
import cors from 'cors'

const app = express()

var corsOptions = {
  origin: 'http://localhost:8081',
}

app.use(cors(corsOptions))

// Parse requests of content-type - application/json
app.use(express.json())

// Parse requests of content-type - application/x-www-form-urlencoded
app.use(express.urlencoded({ extended: true }))

// // Simple route
// app.get('/', (req, res) => {
//   res.json({ message: 'Welcome to my application.' })
// })

import certificates from './routes/certificates.ts'
app.use(certificates)

// Set port, listen for requests
const PORT = process.env.PORT || 8080
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}.`)
})
