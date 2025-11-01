// src/pages/Popular.jsx
import { useMemo } from "react";

const POPULAR = [
  { id: 1, title: "The 7 Habits of Highly Effective People", author: "Stephen R. Covey", cover: "/images/Book/Book1.jpg", score: 98 },
  { id: 2, title: "The 48 Laws of Power", author: "Robert Greene", cover: "/images/Book/Book2.jpg", score: 96 },
  { id: 3, title: "The Four Agreements", author: "Don Miguel Ruiz", cover: "/images/Book/Book3.jpg", score: 95 },
  { id: 4, title: "XOXO", author: "Axie Oh", cover: "/images/Book/Book4.jpg", score: 93 },
  { id: 5, title: "Together Once More", author: "Ayriessyuhada", cover: "/images/Book/Book5.jpg", score: 92 },
  { id: 6, title: "Drifting Home", author: "Netflix", cover: "/images/Book/Book6.jpg", score: 90 },
  { id: 7, title: "Sing If You Can't Dance", author: "Alexia Casale", cover: "/images/Book/Book7.jpg", score: 89 },
  { id: 8, title: "The Songs You’ve Never Heard", author: "Becky Jerams", cover: "/images/Book/Book8.jpg", score: 88 },
];

export default function Popular() {
  const ranked = useMemo(() => [...POPULAR].sort((a,b)=>b.score-a.score), []);
  return (
    <main className="g-main g-main--single">
      <section className="rank-panel">
        <h1 className="rank-title">Most Popular Book</h1>
        <ol className="rank-list">
          {ranked.map((b, i) => (
            <li key={b.id} className="rank-item">
              <div className="rank-num">{i + 1}</div>
              <img className="rank-cover" src={b.cover} alt={b.title} loading="lazy" />
              <div className="rank-meta">
                <h3 className="rank-book">{b.title}</h3>
                <p className="rank-author">Written by {b.author}</p>
              </div>
            </li>
          ))}
        </ol>
      </section>
    </main>
  );
}