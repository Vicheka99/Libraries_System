// src/components/Item.jsx
import { Link } from "react-router-dom";

export default function Item() {
  const books = [
    {
      id: 1,
      title: "A Short History of Biology",
      author: "Stephen R. Covey",
      image: "/images/Book/techno/book1.jpg",
    },
    {
      id: 2,
      title: "SCIENCE TECHNOLOGY and SOCIETY",
      author: "Robert Greene",
      image: "/images/Book/techno/book2.jpg",
    },
    {
      id: 3,
      title: "Technology and Society",
      author: "Don Miguel Ruiz",
      image: "/images/Book/techno/book3.jpg",
    },
    {
      id: 4,
      title: "INTELLIGENCE UNBOUND",
      author: "Don Miguel Ruiz",
      image: "/images/Book/techno/book4.jpg",
    },
    {
      id: 5,
      title: "THINKING MACHINGES",
      author: "Don Miguel Ruiz",
      image: "/images/Book/techno/book5.jpg",
    },
    {
      id: 6,
      title: "NEUROTECHNOLOGY",
      author: "Don Miguel Ruiz",
      image: "/images/Book/techno/book6.jpg",
    },
    {
      id: 7,
      title: "THE SECRET LIFE OF THE MIND",
      author: "Don Miguel Ruiz",
      image: "/images/Book/techno/book7.jpg",
    },
    {
      id: 8,
      title: "THE SCIENCE of Mind",
      author: "Don Miguel Ruiz",
      image: "/images/Book/techno/book8.jpg",
    },
    {
      id: 9,
      title: "how to randall munroe",
      author: "Don Miguel Ruiz",
      image: "/images/Book/techno/book9.jpg",
    },
    {
      id: 10,
      title: "What Is Science?",
      author: "Don Miguel Ruiz",
      image: "/images/Book/techno/book10.jpg",
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