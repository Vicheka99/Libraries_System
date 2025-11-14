// src/components/Item.jsx
import { Link } from "react-router-dom";

export default function Item() {
  const books = [
    {
      id: 1,
      title: "RETHINK YOURSELF",
      author: "Stephen R. Covey",
      image: "/images/Book/self/book1.jpg",
    },
    {
      id: 2,
      title: "AWAKEN YOUR BEST SELF",
      author: "Robert Greene",
      image: "/images/Book/self/book2.jpg",
    },
    {
      id: 3,
      title: "HOW TO BECOME THE BEST YOU",
      author: "Don Miguel Ruiz",
      image: "/images/Book/self/book3.jpg",
    },
    {
      id: 4,
      title: "MASTER The OBVIOUS",
      author: "Don Miguel Ruiz",
      image: "/images/Book/self/book4.jpg",
    },
    {
      id: 5,
      title: "THE AGELESS BRAIN",
      author: "Don Miguel Ruiz",
      image: "/images/Book/self/book5.jpg",
    },
    {
      id: 6,
      title: "The LEFT BRAIN SPEAKS,The RIGHT BRAIN LAUGHS ",
      author: "Don Miguel Ruiz",
      image: "/images/Book/self/book6.jpg",
    },
    {
      id: 7,
      title: "your brain knows more than you think",
      author: "Don Miguel Ruiz",
      image: "/images/Book/self/book7.jpg",
    },
    {
      id: 8,
      title: "hoe to be your own therapist",
      author: "Don Miguel Ruiz",
      image: "/images/Book/self/book8.jpg",
    },
    {
      id: 9,
      title: "The Art of SIMPLE LIVING",
      author: "Don Miguel Ruiz",
      image: "/images/Book/self/book9.jpg",
    },
    {
      id: 10,
      title: "IKIGAI",
      author: "Don Miguel Ruiz",
      image: "/images/Book/self/book10.jpg",
    },
  ];

return (
    <section className="book-section">
      <div className="book-grid">
        {books.map(book => (
          <Link
            key={book.id}
            to={`/books/${book.id}`}      // ← dynamic route
            state={{ book }}              // ← pass full book data
            className="book-card"
            style={{ textDecoration: "none", color: "inherit" }}
          >
            <img src={book.image} alt={book.title} className="book-cover" />
            <h3 className="book-title">{book.title}</h3>
            <p className="book-author">Written by {book.author}</p>
          </Link>
        ))}
      </div>
    </section>
  );
}