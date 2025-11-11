// src/components/Item.jsx
import { Link } from "react-router-dom";

export default function Item() {
  const books = [
    {
      id: 1,
      title: "XOdXO",
      author: "Stephen R. Covey",
      image: "/images/Book/Book1.jpg",
    },
    {
      id: 2,
      title: "Together Once More",
      author: "Robert Greene",
      image: "/images/Book/Book2.jpg",
    },
    {
      id: 3,
      title: "DRIFTING HOME",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book3.jpg",
    },
    {
      id: 4,
      title: "Sing If You Can't Dance",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book4.jpg",
    },
    {
      id: 5,
      title: "The SONGS you're NEVER Heard",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book5.jpg",
    },
    {
      id: 6,
      title: "16 October",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book6.jpg",
    },
    {
      id: 7,
      title: "Our walk Home",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book7.jpg",
    },
    {
      id: 8,
      title: "Lovers By The Sea",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book8.jpg",
    },
    {
      id: 9,
      title: "My CAPRICORN Friend",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book9.jpg",
    },
    {
      id: 10,
      title: "The New Kid in School",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Book10.jpg",
    },
    {
      id: 11,
      title: "The Newjkh Kid in School",
      author: "Don Miguel Rduiz",
      image: "/images/Book/Book10.jpg",
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