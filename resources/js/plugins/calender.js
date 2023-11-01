!(function (s) {
    var o,
        g,
        u = new Date(),
        e =
            (u.setHours(0, 0, 0, 0),
            {
                date: null,
                weekDayLength: 1,
                prevButton: "Prev",
                nextButton: "Next",
                monthYearOrder: "my",
                monthYearSeparator: " ",
                onClickDate: function (t) {},
                onChangeMonth: function (t) {},
                onClickToday: function (t) {},
                onClickMonthNext: function (t) {},
                onClickMonthPrev: function (t) {},
                onClickYearNext: function (t) {},
                onClickYearPrev: function (t) {},
                onShowYearView: function (t) {},
                onSelectYear: function (t) {},
                customDateProps: function (t) {
                    return { classes: "", data: {} };
                },
                customDateHeaderProps: function (t) {
                    return { classes: "", data: {} };
                },
                customWeekProps: function (t) {
                    return { classes: "", data: {} };
                },
                showThreeMonthsInARow: !0,
                enableMonthChange: !0,
                enableYearView: !0,
                showTodayButton: !0,
                highlightSelectedWeekday: !0,
                highlightSelectedWeek: !0,
                todayButtonContent: "Today",
                showYearDropdown: !1,
                min: null,
                max: null,
                disable: function (t) {},
                startOnMonday: !1,
                monthMap: {
                    1: "january",
                    2: "february",
                    3: "march",
                    4: "april",
                    5: "may",
                    6: "june",
                    7: "july",
                    8: "august",
                    9: "september",
                    10: "october",
                    11: "november",
                    12: "december",
                },
                dayMap: {
                    0: "sunday",
                    1: "monday",
                    2: "tuesday",
                    3: "wednesday",
                    4: "thursday",
                    5: "friday",
                    6: "saturday",
                },
                alternateDayMap: {
                    1: "monday",
                    2: "tuesday",
                    3: "wednesday",
                    4: "thursday",
                    5: "friday",
                    6: "saturday",
                    7: "sunday",
                },
            }),
        r = !1;
    function p(t) {
        return new Date(t.getFullYear(), t.getMonth() + 1, 0);
    }
    function c(t, e) {
        c = (c = t).getMonth() + 1 + "/1/" + c.getFullYear();
        var n,
            a = new Date(c),
            s = a.getDate(),
            o = p(t),
            i =
                ((n = (c = t).getMonth()),
                (c = c.getFullYear()),
                0 === n && (--c, (n = 12)),
                new Date(c, n, 0).getDate()),
            r = [],
            c = a.getDay(),
            l = (settings.startOnMonday && (c -= 1), 1);
        if (1 === e) {
            var d = c - 1 < 0 ? 6 + c : c - 1;
            if (d < 6)
                for (; 0 <= d; d--) {
                    var g = new Date(t.getFullYear(), t.getMonth() - 1, i - d);
                    r.push(g);
                }
            for (var u = 7 - r.length, h = 0; h < u; h++) {
                g = new Date(a.getFullYear(), a.getMonth(), s + h);
                r.push(g);
            }
        } else
            for (var f = 7 * (e - (c < 0 ? 2 : 1)) - c, y = 1; y <= 7; y++)
                (g =
                    f + y <= o
                        ? new Date(t.getFullYear(), t.getMonth(), f + y)
                        : new Date(t.getFullYear(), t.getMonth() + 1, l++)),
                    r.push(g);
        return r;
    }
    function a(t, e) {
        var l,
            d,
            n = "";
        return (
            (n += '<div class="calendar-box">'),
            (n = r
                ? (n =
                      (n += '<div class="months-container">') +
                      (function (t) {
                          var e =
                              '<div class="buttons-container">' +
                              (settings.enableMonthChange &&
                              settings.enableYearView
                                  ? '<button class="prev-button">' +
                                    settings.prevButton +
                                    "</button>"
                                  : "") +
                              '<span class="label-container year-label">';
                          if (settings.showYearDropdown) {
                              e += '<select class="year-dropdown">';
                              for (var n = 1970; n < 2117; n++)
                                  n === t.getFullYear()
                                      ? (e +=
                                            '<option selected="selected" value="' +
                                            n +
                                            '">' +
                                            n +
                                            "</option>")
                                      : (e +=
                                            '<option value="' +
                                            n +
                                            '">' +
                                            n +
                                            "</option>");
                              e += "</select>";
                          } else e += t.getFullYear();
                          return (e +=
                              "</span>" +
                              (settings.enableMonthChange &&
                              settings.enableYearView
                                  ? '<button class="next-button">' +
                                    settings.nextButton +
                                    "</button>"
                                  : "") +
                              "</div>");
                      })(e)) +
                  (function (t) {
                      var e,
                          n = "";
                      for (e in ((n += '<div class="months-wrapper">'),
                      settings.monthMap))
                          settings.monthMap.hasOwnProperty(e) &&
                              (n +=
                                  '<span class="month' +
                                  (settings.showThreeMonthsInARow
                                      ? " one-third"
                                      : "") +
                                  '" data-month="' +
                                  e +
                                  '" data-year="' +
                                  t.getFullYear() +
                                  '"><span>' +
                                  settings.monthMap[e] +
                                  "</span></span>");
                      return (n += "</div>");
                  })(e) +
                  "</div>"
                : (n =
                      (n =
                          (n += '<div class="weeks-container">') +
                          (function (t) {
                              var e,
                                  n = [];
                              for (i of settings.monthYearOrder.toLowerCase())
                                  switch (i) {
                                      case "m":
                                          n.push(
                                              '<span class="month-label">' +
                                                  settings.monthMap[
                                                      t.getMonth() + 1
                                                  ] +
                                                  "</span>"
                                          );
                                          break;
                                      case "y":
                                          n.push(
                                              '<span class="year-label">' +
                                                  t.getFullYear() +
                                                  "</span>"
                                          );
                                  }
                              return (
                                  (e = n.join(settings.monthYearSeparator)),
                                  '<div class="buttons-container">' +
                                      (settings.enableMonthChange
                                          ? '<button class="prev-button">' +
                                            settings.prevButton +
                                            "</button>"
                                          : "") +
                                      '<span class="label-container month-container">' +
                                      e +
                                      "</span>" +
                                      (settings.enableMonthChange
                                          ? '<button class="next-button">' +
                                            settings.nextButton +
                                            "</button>"
                                          : "") +
                                      "</div>"
                              );
                          })(e)) +
                      (function () {
                          const { classes: t, data: e } =
                              settings.customWeekProps(0);
                          let n = "";
                          Object.keys(e) &&
                              Object.keys(e).forEach((t) => {
                                  n += ` data-${t}="${e[t]}" `;
                              });
                          var a,
                              s = "",
                              s =
                                  (s += '<div class="weeks-wrapper header">') +
                                  ('<div class="week' +
                                      (settings.startOnMonday
                                          ? " start-on-monday"
                                          : "") +
                                      (t ? " " + t : "") +
                                      '" data-week-no="0"' +
                                      n +
                                      ">");
                          for (a in settings.dayMap)
                              if (settings.dayMap.hasOwnProperty(a)) {
                                  const { classes: o, data: i } =
                                      settings.customDateHeaderProps(a);
                                  let e = "";
                                  Object.keys(i) &&
                                      Object.keys(i).forEach((t) => {
                                          e += ` data-${t}="${i[t]}" `;
                                      }),
                                      (s +=
                                          '<div class="day header' +
                                          (o ? " " + o : "") +
                                          '" data-day="' +
                                          a +
                                          '"' +
                                          e +
                                          "  >" +
                                          ("function" ==
                                          typeof settings.formatWeekDay
                                              ? settings.formatWeekDay(a)
                                              : settings.dayMap[a].substring(
                                                    0,
                                                    settings.weekDayLength
                                                )) +
                                          "</div>");
                              }
                          return (s = s + "</div>" + "</div>");
                      })()) +
                  ((l = e),
                  (d = ""),
                  (d += '<div class="weeks-wrapper">'),
                  t.forEach(function (t, e) {
                      const { classes: n, data: a } =
                          settings.customWeekProps(e);
                      let s = "";
                      Object.keys(a) &&
                          Object.keys(a).forEach((t) => {
                              s += ` data-${t}="${a[t]}" `;
                          }),
                          (d +=
                              '<div class="week' +
                              (settings.startOnMonday
                                  ? " start-on-monday"
                                  : "") +
                              (n ? " " + n : "") +
                              '" data-week-no="' +
                              (e + 1) +
                              '"' +
                              s +
                              ">"),
                          t.forEach(function (t, e) {
                              var n = !1,
                                  a =
                                      ((n = (n =
                                          t.getMonth() !== l.getMonth()
                                              ? !0
                                              : n)
                                          ? " disabled"
                                          : ""),
                                      !1),
                                  a =
                                      g && (t == g.toString() || a)
                                          ? " selected"
                                          : "",
                                  s = !1,
                                  o =
                                      ((s = (s = t == u.toString() ? !0 : s)
                                          ? " today"
                                          : ""),
                                      "ola");
                              ((settings.min && settings.min > t) ||
                                  (settings.max && settings.max < t) ||
                                  (settings.disable &&
                                      "function" == typeof settings.disable &&
                                      settings.disable(t))) &&
                                  (o = 'disabled="disabled" ');
                              const { classes: i, data: r } =
                                  settings.customDateProps(t);
                              let c = "";
                              Object.keys(r) &&
                                  Object.keys(r).forEach((t) => {
                                      c += ` data-${t}="${r[t]}" `;
                                  }),
                                  (d +=
                                      '<div class="day' +
                                      n +
                                      a +
                                      s +
                                      (i ? " " + i : "") +
                                      '" data-date="' +
                                      t +
                                      '" ' +
                                      c +
                                      o +
                                      " ><span>" +
                                      ("function" == typeof settings.formatDate
                                          ? settings.formatDate(t)
                                          : t.getDate()) +
                                      "</span></div>");
                          }),
                          (d += "</div>");
                  }),
                  (d += "</div>")) +
                  "</div>"),
            settings.showTodayButton &&
                (n +=
                    '<div class="special-buttons"><button class="today-button">' +
                    settings.todayButtonContent +
                    "</button></div>"),
            (n += "</div>")
        );
    }
    function l(t) {
        var n,
            e = (function (t) {
                for (
                    var e = p(t).getDate(),
                        n = p(t).getDate(),
                        a = parseInt(e / 7) + 1,
                        s = [],
                        o = 1;
                    o <= a;
                    o++
                )
                    s.push(c(t, o));
                return (
                    (e = (e = s[s.length - 1])[e.length - 1].getDate()) < n &&
                        n - e < 7 &&
                        s.push(c(t, o)),
                    s
                );
            })(t);
        o.html(a(e, t)),
            settings.highlightSelectedWeekday &&
                0 < (e = o.find(".selected")).length &&
                ((n = new Date(e.data("date")).getDay()),
                o.find(".week").each(function (t, e) {
                    s(e)
                        .find(
                            ".day:eq(" +
                                (n - (settings.startOnMonday ? 1 : 0)) +
                                ")"
                        )
                        .addClass("highlight");
                })),
            settings.highlightSelectedWeek &&
                o.find(".selected").parents(".week").addClass("highlight");
    }
    (s.fn.updateCalendarOptions = function (t) {
        t = s.extend(settings, t);
        s.fn.calendar.bind(this)(t);
    }),
        (s.fn.calendar = function (t) {
            var a;
            return (
                (settings = s.extend(e, t)).startOnMonday &&
                    (settings.dayMap = settings.alternateDayMap),
                settings.min &&
                    ((settings.min = new Date(settings.min)),
                    settings.min.setHours(0),
                    settings.min.setMinutes(0),
                    settings.min.setSeconds(0)),
                settings.max &&
                    ((settings.max = new Date(settings.max)),
                    settings.max.setHours(0),
                    settings.max.setMinutes(0),
                    settings.max.setSeconds(0)),
                (o = s(this)),
                (a = settings.date
                    ? ((g =
                          "string" == typeof settings.date
                              ? new Date(settings.date)
                              : settings.date).setHours(0, 0, 0, 0),
                      g)
                    : u),
                l((window.currentDate = a)),
                settings.enableMonthChange &&
                    (o
                        .off("click", ".weeks-container .prev-button")
                        .on(
                            "click",
                            ".weeks-container .prev-button",
                            function (t) {
                                (a = new Date(
                                    a.getFullYear(),
                                    a.getMonth() - 1,
                                    1
                                )),
                                    settings.onClickMonthPrev(a),
                                    l(a);
                            }
                        ),
                    o
                        .off("click", ".weeks-container .next-button")
                        .on(
                            "click",
                            ".weeks-container .next-button",
                            function (t) {
                                (a = new Date(
                                    a.getFullYear(),
                                    a.getMonth() + 1,
                                    1
                                )),
                                    settings.onClickMonthNext(a),
                                    l(a);
                            }
                        )),
                o.off("click", ".day").on("click", ".day", function (t) {
                    var e = s(this).data("date");
                    "disabled" !== s(this).attr("disabled") &&
                        settings.onClickDate(e);
                }),
                settings.enableMonthChange &&
                    settings.enableYearView &&
                    (o
                        .off("click", ".month-container")
                        .on("click", ".month-container", function (t) {
                            (r = !0),
                                (a = new Date(a.getFullYear(), 0, 1)),
                                settings.onShowYearView(a),
                                l(a);
                        }),
                    o
                        .off("click", ".months-container .month")
                        .on("click", ".months-container .month", function (t) {
                            var e = s(this),
                                n = e.data("month"),
                                e = e.data("year"),
                                e = new Date(e, n - 1, 1);
                            settings.onChangeMonth(e), (r = !1), l((a = e));
                        }),
                    o
                        .off("click", ".months-container .prev-button")
                        .on(
                            "click",
                            ".months-container .prev-button",
                            function (t) {
                                (a = new Date(a.getFullYear() - 1, 0, 1)),
                                    settings.onClickYearPrev(a),
                                    settings.onSelectYear(a),
                                    l(a);
                            }
                        ),
                    o
                        .off("click", ".months-container .next-button")
                        .on(
                            "click",
                            ".months-container .next-button",
                            function (t) {
                                (a = new Date(a.getFullYear() + 1, 0, 1)),
                                    settings.onClickMonthNext(a),
                                    settings.onSelectYear(a),
                                    l(a);
                            }
                        ),
                    o
                        .off("change", ".months-container .year-dropdown")
                        .on(
                            "change",
                            ".months-container .year-dropdown",
                            function (t) {
                                var e = s(this).val();
                                (a = new Date(e, 0, 1)),
                                    settings.onSelectYear(a),
                                    l(a);
                            }
                        )),
                settings.showTodayButton &&
                    o
                        .off("click", ".today-button")
                        .on("click", ".today-button", function (t) {
                            (g = a = u),
                                settings.onClickToday(u),
                                settings.onClickDate(u),
                                (r = !1),
                                l(a);
                        }),
                (this.getSelectedDate = function () {
                    return g;
                }),
                this
            );
        });
})(jQuery);
