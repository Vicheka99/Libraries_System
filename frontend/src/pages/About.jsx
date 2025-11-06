

/* ============================
   EASY CONFIG (edit these)
============================ */
const HERO = {
  image: "/images/Image/cover/cover1.jpg", // change path if needed
  title: "About Us",
  subtitle:
    "From preschool to pre-tertiary, our students enjoy fun, interactive and relevant lessons and are empowered to think beyond the confines of the classroom.",
  ctaText: "See More",
  ctaHref: "#about-more",
};

const INFO_CARDS = [
  {
    title: "Our Mission",
    text:
      "Inspire a lifelong love of reading by providing inclusive access to books, technology, and supportive learning spaces.",
  },
  {
    title: "What We Do",
    text:
      "We curate collections, run clubs and workshops, and partner with schools to make research and literacy engaging for everyone.",
  },
  {
    title: "Our Values",
    text:
      "Accessibility, curiosity, and community. We believe knowledge should be welcoming, discoverable, and fun.",
  },
];

const MEMBERS = [
  {
    group: "UX/UI & Design",
    people: ["Sok Chomroeun", "Oum Chansopheap", "Un Rithy Reach"],
  },
  {
    group: "Data Analysis",
    people: ["Seung Wannet", "Sum Virakroth"],
  },
  {
    group: "Frontend",
    people: ["Sien KimYong", "Sophy David", "Vath Bundavit"],
  },
  {
    group: "Backend & Deploy",
    people: ["Leng Lyhour", "SuLi", "Suy Koemhong"],
  },
];

/* ============================
            PAGE
  <main className="g-main g-main--single"> … </main>  
============================ */
export default function About() {
  return (
    <main className="g-main g-main--single g-main--singlepage--fullbleed"> 
      {/* HERO */}
      <section
        className="about-hero"
        style={{ "--hero-image": `url(${HERO.image})` }}
      >
        <div className="about-hero__content">
          <h1 className="about-title">{HERO.title}</h1>
          <p className="about-subtitle">{HERO.subtitle}</p>
          <a href={HERO.ctaHref} className="btn btn--light">
            {HERO.ctaText}
          </a>
        </div>
      </section>

      {/* INFO GRID */}
      <section id="about-more" className="about-panel">
        <div className="about-grid">
          {INFO_CARDS.map((c) => (
            <div className="about-card" key={c.title}>
              <h3>{c.title}</h3>
              <p>{c.text}</p>
            </div>
          ))}
        </div>
      </section>

      {/* MEMBER SECTION */}
      <section className="about-members">
        <h2 className="member-title">
          Member
          <span className="member-highlight" />
        </h2>

        <div className="member-grid">
          {MEMBERS.map((col) => (
            <div className="member-col" key={col.group}>
              <h3>{col.group}</h3>
              {col.people.map((p) => (
                <p key={p}>{p}</p>
              ))}
            </div>
          ))}
        </div>
      </section>
    </main>
  );
}