// src/pages/Popular.jsx
import { useMemo } from "react";

const POPULAR = [
  { id: 1, title: "XOXO", author: "Stephen R. Covey", cover: "/images/Book/Book1.jpg", score: 98 },
  { id: 2, title: "Together Once More", author: "Robert Greene", cover: "/images/Book/Book2.jpg", score: 96 },
  { id: 3, title: "DRIFTING HOME", author: "Don Miguel Ruiz", cover: "/images/Book/Book3.jpg", score: 95 },
  { id: 4, title: "Sing If You Can't Dance", author: "Axie Oh", cover: "/images/Book/Book4.jpg", score: 93 },
  { id: 5, title: "The SONGS you're NEVER Heard", author: "Ayriessyuhada", cover: "/images/Book/Book5.jpg", score: 92 },
  { id: 6, title: "16 October", author: "Netflix", cover: "/images/Book/Book6.jpg", score: 90 },
  { id: 7, title: "Our Walk Home", author: "Alexia Casale", cover: "/images/Book/Book7.jpg", score: 89 },
  { id: 8, title: "Lovers By The Sea", author: "Becky Jerams", cover: "/images/Book/Book8.jpg", score: 88 },
  { id: 9, title: "my CAPRICORN friend", author: "Becky Jerams", cover: "/images/Book/Book9.jpg", score: 88 },
  { id: 10, title: "The New Kid in School", author: "Becky Jerams", cover: "/images/Book/Book10.jpg", score: 88 },
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