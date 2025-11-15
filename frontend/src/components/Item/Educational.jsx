// src/components/Item.jsx
import { Link } from "react-router-dom";

export default function Item() {
  const books = [
    {
      id: 1,
      title: "The LOST LIBRARY",
      author: "Rebecca Stead and Wendy Mass",
      image: "/images/Book/Education/book1.jpg",
    },
    {
      id: 2,
      title: "Enchanted Forest",
      author: "Patricia Collins Wrede",
      image: "/images/Book/Education/book2.jpg",
    },
    {
      id: 3,
      title: "THE SHADOW SOVERELGN SERIES",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Education/book3.jpg",
    },
    {
      id: 4,
      title: "The CONJURERS FIGHT OF THE FALLEN",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Education/book4.jpg",
    },
    {
      id: 5,
      title: "THE LOST WONDERLAND",
      author: "Patricia Collins Wrede",
      image: "/images/Book/Education/book5.jpg",
    },
    {
      id: 6,
      title: "THE MAGIC APPRENTICE",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Education/book6.jpg",
    },
    {
      id: 7,
      title: "CAMP OUT QUEST",
      author: "Genevieve Bute",
      image: "/images/Book/Education/book7.jpg",
    },
    {
      id: 8,
      title: "FOREST SPRING",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Education/book8.jpg",
    },
    {
      id: 9,
      title: "IF WE WERE GIANTS",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Education/book9.jpg",
    },
    {
      id: 10,
      title: "PILAR RAMIREZ AND THE ESCAPE FROM ZAFA",
      author: "Don Miguel Ruiz",
      image: "/images/Book/Education/book10.jpg",
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