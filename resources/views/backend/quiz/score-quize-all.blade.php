@include('layouts.dashboard.header')

<style>
    .site-header .for-quiz,
    .floating-setting {
        display: block;
    }
</style>

<main class="content">
    <section class="main-content">
        <div class="title-head">
            <h1>Quiz Scoring Overview</h1>
        </div>
        <div class="white-box scoring-section">
            <div class="single">
                <h6><strong>QUESTION #6:</strong> Rank below features of a fitness tracker in order of most important to least important.</h6>
                <div class="table-responsive">
                    <table class="scoring-table">
                        <thead>
                            <tr>
                                <th>Answer</th>
                                <th>Rank 1st</th>
                                <th>Rank 2nd</th>
                                <th>Rank 3rd</th>
                                <th>Rank Last</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Inspiring and evolutionary</td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Inspiring and evolutionary"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_purple color_white">Visionary +8</span></td>
                                            <td><span class="btn background_purple color_black">Complaint +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Inspiring and evolutionary"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_purple color_white">Visionary +7</span></td>
                                            <td><span class="btn background_purple color_black">Complaint +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Inspiring and evolutionary"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_purple color_white">Visionary +6</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Inspiring and evolutionary"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_purple color_white">Visionary +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>Present and accepting</td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Present and accepting"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_purple color_white">Appreciation +8</span></td>
                                            <td><span class="btn background_purple color_black">Defense +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Present and accepting"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_purple color_white">Appreciation +7</span></td>
                                            <td><span class="btn background_purple color_black">Defense +1</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Present and accepting"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_purple color_white">Appreciation +6</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Present and accepting"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_purple color_white">Appreciation +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>Clear and discerning</td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Clear and discerning"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_blue color_white">Truth +8</span></td>
                                            <td><span class="btn background_blue color_black">Control +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Clear and discerning"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_blue color_white">Truth +7</span></td>
                                            <td><span class="btn background_blue color_black">Control +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Clear and discerning"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_blue color_white">Truth +6</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Clear and discerning"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_blue color_white">Truth +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>Open-minded and empathic</td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Open-minded and empathic"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_blue color_white">Harmony +8</span></td>
                                            <td><span class="btn background_blue color_black">Collapse +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Open-minded and empathic"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_blue color_white">Harmony +7</span></td>
                                            <td><span class="btn background_blue color_black">Collapse +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Open-minded and empathic"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_blue color_white">Harmony +6</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Open-minded and empathic"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_blue color_white">Harmony +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>Free spirited and independent</td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Free spirited and independent"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_green color_white">Freedom +8</span></td>
                                            <td><span class="btn background_green color_black">Avoidance +8</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Free spirited and independent"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_green color_white">Freedom +7</span></td>
                                            <td><span class="btn background_green color_black">Avoidance +7</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Free spirited and independent"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_green color_white">Freedom +6</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Free spirited and independent"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_green color_white">Freedom +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>Committed and adoring</td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Committed and adoring"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_green color_white">Devotion +8</span></td>
                                            <td><span class="btn background_green color_black">Anxious +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Committed and adoring"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_green color_white">Devotion +7</span></td>
                                            <td><span class="btn background_green color_black">Anxious +1</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Committed and adoring"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_green color_white">Devotion +6</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Committed and adoring"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_green color_white">Devotion +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>Dynamic and alive</td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Dynamic and alive"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_primary color_white">Passion +8</span></td>
                                            <td><span class="btn background_primary color_black">Addiction +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Dynamic and alive"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_primary color_white">Passion +7</span></td>
                                            <td><span class="btn background_primary color_black">Addiction +1</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Dynamic and alive"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_primary color_white">Passion +6</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Dynamic and alive"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_primary color_white">Passion +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>Collaborative and principled</td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Collaborative and principled"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_primary color_white">Partnership +8</span></td>
                                            <td><span class="btn background_primary color_black">Partnership +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Collaborative and principled"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_primary color_white">Partnership +7</span></td>
                                            <td><span class="btn background_primary color_black">Partnership +1</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Collaborative and principled"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_primary color_white">Partnership +6</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#scoring_modal" data-bs-whatever="Collaborative and principled"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_primary color_white">Partnership +2</span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <aside class="ques-aside">
        <div class="single">
            @include('backend.quiz.all-quiz-question')
        </div>
    </aside>
</main>

<!-- Media Gallery Modal -->
<div class="modal modal-scoring fade" id="scoring_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="scoring_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scoring_modalLabel">ADD SCORE for the answer "<span>Clear and discerning</span>"</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
            </div>
            <div class="modal-body">
                <form class="form">
                    <div class="control-group">
                        <div class="row gy-3">
                            <div class="col-md-5">
                                <select name="type">
                                    <option data-type="1">Primary Gift</option>
                                    <option data-type="2">Primary Shadow</option>
                                    <option data-type="3">Reference</option>
                                    <option data-type="4">Communication Style</option>
                                    <option data-type="5">Decision-Making Style</option>
                                    <option data-type="6">Parenting Style</option>
                                    <option data-type="7">Erotic Style</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select name="value">
                                    <option data-value="1">Possibility</option>
                                    <option data-value="1">Appreciation</option>
                                    <option data-value="1">Truth</option>
                                    <option data-value="1">Harmony</option>
                                    <option data-value="1">Freedom</option>
                                    <option data-value="1">Devotion</option>
                                    <option data-value="1">Passion</option>
                                    <option data-value="1">Partnership</option>

                                    <option data-value="2" hidden>Complaint</option>
                                    <option data-value="2" hidden>Defense</option>
                                    <option data-value="2" hidden>Control</option>
                                    <option data-value="2" hidden>Collapse</option>
                                    <option data-value="2" hidden>Avoidance</option>
                                    <option data-value="2" hidden>Anxious</option>
                                    <option data-value="2" hidden>Addiction</option>
                                    <option data-value="2" hidden>Co-Dependence</option>

                                    <option data-value="3" hidden>Internal</option>
                                    <option data-value="3" hidden>External</option>

                                    <option data-value="4" hidden>Explicit</option>
                                    <option data-value="4" hidden>Implicit</option>
                                    <option data-value="4" hidden>Reactive</option>
                                    <option data-value="4" hidden>Repressive</option>

                                    <option data-value="5" hidden>Directive</option>
                                    <option data-value="5" hidden>Collaborative</option>
                                    <option data-value="5" hidden>Considered</option>
                                    <option data-value="5" hidden>Intuitive</option>

                                    <option data-value="6" hidden>Autonomous</option>
                                    <option data-value="6" hidden>Engaged</option>
                                    <option data-value="6" hidden>Esteem from Achievement</option>
                                    <option data-value="6" hidden>Esteem from Acceptance</option>

                                    <option data-value="7" hidden>Initiating</option>
                                    <option data-value="7" hidden>Reciprocating</option>
                                    <option data-value="7" hidden>Spontenaiety</option>
                                    <option data-value="7" hidden>Planning</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="number" value="8">
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <p>REMOVE SCORE for the answer "<span class="title_name">Clear and discerning</span>"</p>
                        <div class="score-list">
                            <label>Truth - 2 <a href="javascript:void(0)"><i class="fas fa-times"></i></a></label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Score</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.dashboard.footer')