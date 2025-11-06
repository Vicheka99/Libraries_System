import { useState } from "react";

export default function Donate() {
  const [values, setValues] = useState({ name: "", email: "", amount: "" });
  const [msg, setMsg] = useState("");

  const onChange = (e) => setValues({ ...values, [e.target.name]: e.target.value });

  const onSubmit = (e) => {
    e.preventDefault();
    if (!values.name || !values.email || !values.amount) {
      setMsg("Please fill in all required fields.");
      return;
    }
    setMsg("Thank you for your generous donation! (demo only)");
    // TODO: send to backend / payment
  };

  return (
    <>
      {/* HERO */}
      <section className="don-hero" role="img" aria-label="Hands holding a heart">
        <div className="don-hero__overlay" />
        <div className="don-hero__content">
          <h1 className="don-hero__title">YOUR GIFT CREATES HEALING</h1>
          <p className="don-hero__subtitle">
            When you donate to Hope for Healing, you empower vulnerable communities to heal, grow, and thrive.
          </p>
        </div>
      </section>

      {/* CONTENT + FORM */}
      <section className="don-wrap">
        <div className="don-grid">
          {/* Left copy */}
          <div className="don-copy">
            <span className="don-eyebrow">DONATE</span>
            <h2 className="don-title">Donate To Our Organization</h2>
            <p className="don-text">
              Hope for Healing is a registered 501(c)3 non-profit charity. Donations are tax-deductible to the
              extent allowed by law. No goods or services are provided in return for contributions. Please consult
              IRS publication #526 for information about deductibility of charitable donations. Please save your
              receipt for your records.
            </p>
          </div>

          {/* Right form */}
          <aside className="don-card" aria-label="Donation form">

          </aside>
        </div>
      </section>
    </>
  );
}