(
  this["webpackJsonpreact-app"] = this["webpackJsonpreact-app"] || []
).push([[0],
{
  14: function (e, t, r) {
    "use strict";
    r.r(t);
    var n = r(1),
      s = r.n(n),
      a = r(4),
      c = r.n(a),
      i = r(3),
      o = r(5),
      l = r(6),
      d = r(8),
      j = r(7),
      u = ".",
      p = r(0),
      b = function (e) {
        return Object(p.jsxs)(
          "div",
          {
            className: "filter-bar row justify-content-around",
            children: [
              Object(p.jsxs)(
                "div",
                {
                  className: "col-auto" + ("none" !== e.currentFilter.gender ? " sort-active" : ""),
                  "data-toggle": "modal", "data-target": "#filter-modal",
                  children: [Object(p.jsx)(
                    "img",
                    {
                      src: "./img/filter.png",
                      alt: "filter"
                    }
                  ),
                  Object(p.jsx)("span", { children: "Filter" })]
                }),
              Object(p.jsxs)("div",
                {
                  className: "col-auto" + ("desc" === e.currentSort ? " sort-active" : ""),
                  onClick: function () { return e.updateSort("desc") },
                  children: [Object(p.jsx)
                    ("img", { src: "./img/desc.png", alt: "sort-desc" }),
                  Object(p.jsx)("span", { children: "Highest rent first" })]
                }),
              Object(p.jsxs)("div",
                {
                  className: "col-auto" + ("asc" === e.currentSort ? " sort-active" : ""),
                  onClick: function () { return e.updateSort("asc") },
                  children: [Object(p.jsx)("img", { src: "./img/asc.png", alt: "sort-asc" }),
                  Object(p.jsx)("span",
                    { children: "Lowest rent first" })]
                })]
          })
      },
      m = function (e) {
        return Object(p.jsx)("div",
          {
            className: "modal fade", id: "filter-modal", tabIndex: "-1", role: "dialog", "aria-labelledby": "filter-heading", "aria-hidden": "true",
            children: Object(p.jsx)("div",
              {
                className: "modal-dialog modal-dialog-centered", role: "document", children: Object(p.jsxs)("div",
                  {
                    className: "modal-content", children: [Object(p.jsxs)("div",
                      {
                        className: "modal-header", children: [Object(p.jsx)("h3",
                          { className: "modal-title", id: "filter-heading", children: "Filters" }),
                        Object(p.jsx)("button",
                          {
                            type: "button", className: "close", "data-dismiss": "modal", "aria-label": "Close",
                            children: Object(p.jsx)("span",
                              { "aria-hidden": "true", children: "\xd7" })
                          })]
                      }),
                    Object(p.jsxs)("div",
                      {
                        className: "modal-body", children: [Object(p.jsx)("h5", { children: "Gender" }),
                        Object(p.jsx)("hr", {}),
                        Object(p.jsxs)("div",
                          {
                            children: [Object(p.jsx)("button",
                              {
                                className: "btn btn-outline-dark" + ("none" === e.currentFilter.gender ? " btn-active" : ""),
                                onClick: function () { return e.updateFilter("none") }, children: "No Filter"
                              }),
                            Object(p.jsxs)("button",
                              {
                                className: "btn btn-outline-dark" + ("unisex" === e.currentFilter.gender ? " btn-active" : ""),
                                onClick: function () { return e.updateFilter("unisex") }, children: [Object(p.jsx)("i", { className: "fas fa-venus-mars" }), "Unisex"]
                              }),
                            Object(p.jsxs)("button",
                              {
                                className: "btn btn-outline-dark" + ("male" === e.currentFilter.gender ? " btn-active" : ""),
                                onClick: function () { return e.updateFilter("male") }, children: [Object(p.jsx)("i",
                                  { className: "fas fa-mars" }), "Male"]
                              }), Object(p.jsxs)("button",
                                {
                                  className: "btn btn-outline-dark" + ("female" === e.currentFilter.gender ? " btn-active" : ""),
                                  onClick: function () { return e.updateFilter("female") }, children: [Object(p.jsx)("i",
                                    { className: "fas fa-venus" }), "Female"]
                                })]
                          })]
                      }), Object(p.jsx)("div",
                        {
                          className: "modal-footer", children: Object(p.jsx)("button",
                            { "data-dismiss": "modal", className: "btn btn-success", children: "Okay" })
                        })]
                  })
              })
          })
      }, h = function (e) {
        for (var t, r = [], n = 0; n < 5; n++)t = e.rating >= n + .8 ? Object(p.jsx)
          ("i", { className: "fas fa-star" }, n) : e.rating >= n + .3 ? Object(p.jsx)("i",
            { className: "fas fa-star-half-alt" }, n) : Object(p.jsx)("i", { className: "far fa-star" }, n), r.push(t); return Object(p.jsx)("div", { className: "star-container", title: e.rating, children: r })
      }, g = function (e) {
        var t; return t = e.is_interested ? "fas" : "far",
          Object(p.jsxs)("div",
            {
              className: "interested-container", children: [Object(p.jsx)("i",
                {
                  className: "is-interested-image ".concat(t, " fa-heart"),
                  onClick: function () { return e.toggleInterested() }
                }),
              Object(p.jsxs)("div",
                {
                  className: "interested-text", children: [Object(p.jsx)("span",
                    { className: "interested-user-count", children: e.user_count }),
                    " interested"]
                })]
            })
      }, f = function (e) {
        var t, r = (parseFloat(e.property.rating_clean) + parseFloat(e.property.rating_food) + parseFloat(e.property.rating_safety)) / 3;
        r = (r = Math.round(10 * r) / 10).toFixed(1),
          t = "male" === e.property.gender ? Object(p.jsx)("img",
            { src: "./img/male.png", alt: "male" }) : "female" === e.property.gender ? Object(p.jsx)("img", { src: "./img/female.png", alt: "female" }) : Object(p.jsx)("img",
              { src: "./img/unisex.png", alt: "unisex" });
        var n = (new Intl.NumberFormat).format(e.property.rent);
        return Object(p.jsxs)("div",
          {
            className: "property-card property-id-".concat(e.property.id, " row"),
            children: [Object(p.jsx)("div",
              {
                className: "image-container col-md-4",
                children: Object(p.jsx)("img", { src: "./" + e.property.image, alt: "property" })
              }),
            Object(p.jsxs)("div", {
              className: "content-container col-md-8",
              children: [Object(p.jsxs)("div",
                {
                  className: "row no-gutters justify-content-between",
                  children: [Object(p.jsx)(h, { rating: r }), Object(p.jsx)
                    (g, { is_interested: e.property.is_interested, toggleInterested: e.toggleInterested, user_count: e.property.interested_users_count })]
                }),
              Object(p.jsxs)("div", {
                className: "detail-container", children: [Object(p.jsx)("div",
                  { className: "property-name", children: e.property.name }),
                Object(p.jsx)("div", { className: "property-address", children: e.property.address }),
                Object(p.jsx)("div", { className: "property-gender", children: t })]
              }),
              Object(p.jsxs)("div", {
                className: "row no-gutters", children: [Object(p.jsxs)("div",
                  {
                    className: "rent-container col-6", children: [Object(p.jsxs)("div", { className: "rent", children: ["\u20b9 ", n, "/-"] }),
                    Object(p.jsx)("div", { className: "rent-unit", children: "per month" })]
                  }),
                Object(p.jsx)("div", {
                  className: "button-container col-6", children: Object(p.jsx)("a",
                    { href: "property_detail.php?property_id=" + e.property.id, className: "btn btn-primary", children: "View" })
                })]
              })]
            })]
          })
      }, x = function () {
        return Object(p.jsx)("div",
          { className: "no-property-container", children: Object(p.jsx)("p", { children: "No PG to list" }) })
      },
      O = function (e) {
        Object(d.a)(r, e);
        var t = Object(j.a)(r); function r() {
          var e;
          Object(o.a)(this, r); for (var n = arguments.length, s = new Array(n), a = 0; a < n; a++)s[a] = arguments[a];
          return (e = t.call.apply(t, [this].concat(s))).state = { properties: [], sort: "none", filter: { gender: "none" } },
            e.toggleInterested = function (t) {
              fetch("".concat(u, "/api/toggle_interested.php?property_id=").concat(t)).then((function (e) { return e.json() })).then((function (r) {
                r.success ? (console.log("Success"),
                  e.updateInterested(t)) : r.success || r.is_logged_in || (console.log("Not logged in!"),
                    window.$("#login-modal").modal("show"))
              })).catch((function (e) { console.log("Error fetching and parsing data", e) }))
            },
            e.updateInterested = function (t) {
              var r = Object(i.a)(e.state.properties);
              r.forEach((function (e) { e.id === t && (e.is_interested = !e.is_interested, e.is_interested ? e.interested_users_count++ : e.interested_users_count--) })),
                e.setState({ properties: r })
            }, e.updateSort = function (t) { e.setState({ sort: t }) },
            e.updateFilter = function (t) { e.setState({ filter: { gender: t } }) }, e
        }
        return Object(l.a)(r, [{
          key: "componentDidMount",
          value: function () {
            var e = this, t = window.location.search, r = new URLSearchParams(t).get("location");
            fetch("".concat(u, "/api/get_properties_by_location.php?location=").concat(r)).then((function (e) { return e.json() })).then(( 
              function (t) { e.setState({ properties: t }) })) .catch( (function (e) { console.log("Error fetching and parsing data", e) }))
          }
        },
        {
          key: "render", value: function () {
            var e, t = this, r = Object(i.a)(this.state.properties);
            return "none" !== this.state.sort && ("desc" === this.state.sort ? r.sort((function (e, t) { return t.rent - e.rent })) : r.sort((function (e, t) { return e.rent - t.rent }))),
              "none" !== this.state.filter.gender && (r = r.filter((function (e) { return e.gender === t.state.filter.gender }))),
              e = r.length > 0 ? r.map((function (e) {
                return Object(p.jsx)(f, {
                  property: e, toggleInterested: function () { return t.toggleInterested(e.id) }
                }, e.id)
              })) : Object(p.jsx)(x, {}),
              Object(p.jsxs)(p.Fragment, {
                children: [Object(p.jsxs)("div",
                  {
                    className: "page-container", children: [Object(p.jsx)(b,
                      { currentSort: this.state.sort, updateSort: this.updateSort, currentFilter: this.state.filter }), e]
                  }),
                Object(p.jsx)(m, { currentFilter: this.state.filter, updateFilter: this.updateFilter })]
              })
          }
        }]), r
      }
        (n.Component); c.a.render(Object(p.jsx)(s.a.StrictMode, { children: Object(p.jsx)(O, {}) }),
          document.getElementById("root"))
  }
}, [[14, 1, 2]]]);
//# sourceMappingURL=main.d86a88e7.chunk.js.map