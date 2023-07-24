@include('layouts.header-quiz')
<main class="content">
    <section class="quiz-screen" style="background-image: url('{{ asset('images/Evolving Love Background Image - Android Jones Union (hires).jpeg')}}');">
        <div class="container">
            <form method="post" id="question-submit">
                @csrf
                <div id="question1">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>1)</small> What is your current relationship status?*</span>
                        </h3>
                        <div class="form type-checkbox w-100 mb-3">
                            <label>
                                <input type="radio" name="question1" value="I'm currently single and happy to stay that way for now">
                                <span>I'm currently single and happy to stay that way for now</span>
                            </label>
                            <label>
                                <input type="radio" name="question1" value="I'm currently single and wanting to find a relationship">
                                <span>I'm currently single and wanting to find a relationship</span>
                            </label>
                            <label>
                                <input type="radio" name="question1" value="I'm in a relationship that's really on the rocks">
                                <span>I'm in a relationship that's really on the rocks</span>
                            </label>
                            <label>
                                <input type="radio" name="question1" value="I'm in a relationship that's good but it's got some challenges">
                                <span>I'm in a relationship that's good but it's got some challenges</span>
                            </label>
                            <label>
                                <input type="radio" name="question1" value="I'm in a relationship that's in bliss">
                                <span>I'm in a relationship that's in bliss</span>
                            </label>
                            <label style="border: none;"><span class="text-danger" id="question1-error"></span></label>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next1" onClick="question1();">Next</a>
                    </div>
                </div>

                <div id="question2" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>2)</small> Do you have a particular relationship in mind you'd like to profile?*</span>
                        </h3>
                        <p>We recommend taking this quiz with a particular relationship in mind ((i.e. romantic partner, business colleague, family member, or friend) so that your profile reflects the dynamics in that relationship.</p>
                        <div class="form type-checkbox yes-no mb-3">
                            <label>
                                <input type="radio" name="question2" value="Yes">
                                <span>Yes</span>
                            </label>
                            <label>
                                <input type="radio" name="question2" value="No">
                                <span>No</span>
                            </label>
                            <label style="border: none;"><span class="text-danger" id="question2-error"></span></label>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next2" onClick="question2();">Next</a>
                    </div>
                </div>

                <div id="question3" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>3)</small> Which type of relationship would you like to profile today?</span>
                        </h3>
                        <div class="form type-checkbox mb-3">
                            <label>
                                <input type="radio" name="question3" value="romantic partner">
                                <span>Romantic partner</span>
                            </label>
                            <label>
                                <input type="radio" name="question3" value="business colleague">
                                <span>Business colleague</span>
                            </label>
                            <label>
                                <input type="radio" name="question3" value="family member">
                                <span>Family member</span>
                            </label>
                            <label>
                                <input type="radio" name="question3" value="friend">
                                <span>Friend</span>
                            </label>
                            <label style="border: none;"><span class="text-danger" id="question3-error"></span></label>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next3" onClick="question3();">Next</a>
                    </div>
                </div>

                <div id="question4" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question replace">
                            <span><small>4)</small> What is your Which type of relationship would you like to profile today?'s name?</span>
                        </h3>
                        <p>Keep this person in mind when you answer the rest of the questions in this quiz.</p>
                        <p><strong>NOTE:</strong> You are welcome to take this quiz multiple times to profile different relationships in the future.</p>
                        <div class="form w-100 mb-3">
                            <input placeholder="Type your answere here..." name="question4" type="text">
                            <label style="border: none;"><span class="text-danger" id="question4-error"></span></label>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next4" onClick="question4();">Next</a>
                    </div>
                </div>

                <div id="part1" style="display:none;">
                    <div class="inner">
                        <h2>PART I: YOUR RELATIONSHIP QUALITIES & GIFTS</h2>
                        <p>There are 6 questions that each have 8 choices which you will put in <strong>Rank order</strong>. Rank 1st is what is most predominant and Ranked 8th (last) is what is least predominant.</p>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="nextpart1" onClick="part1();">Next</a>
                    </div>
                </div>

                <div id="question5" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>5)</small> Others would say I'm likely to make a first impression as...*</span>
                        </h3>
                        <p><small>Drag and drop to rank your top 3 and bottom ranked choices</small></p>
                        <div class="form type-checkbox type-2 w-100 mb-3">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="list-container">
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question5[]" value="appreciation">
                                                <span><small>A</small> Present and accepting</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question5[]" value="passion">
                                                <span><small>B</small> Dynamic and alive</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question5[]" value="partnership">
                                                <span><small>C</small> Collaborative and principled</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question5[]" value="truth">
                                                <span><small>D</small> Clear and discerning</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question5[]" value="possibility">
                                                <span><small>E</small> Inspiring and evolutionary</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question5[]" value="freedom">
                                                <span><small>F</small> Free spirited and independent</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question5[]" value="devotion">
                                                <span><small>G</small> Committed and adoring</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question5[]" value="harmony">
                                                <span><small>H</small> Open-minded and empathic</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rankOrder-container">
                                        <div class="rankOrder top_rank">
                                            <h4>Rank Top 3 Choices</h4>
                                            <ul>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                            </ul>
                                        </div>
                                        <div class="rankOrder last_rank">
                                            <h4>Rank Last Choice</h4>
                                            <ul>
                                                <li class="draggedLast-value"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <label style="border: none;"><span class="text-danger" id="question5-error"></span></label>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next5" onClick="question5();">Next</a>
                    </div>
                </div>

                <div id="question6" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question replace6">
                            <span><small>6)</small> Between my Which type of relationship would you like to profile today? and I, I tend to be the one that emphasizes...*</span>
                        </h3>
                        <p><small>Drag and drop to rank your top 3 and bottom ranked choices</small></p>
                        <div class="form type-checkbox type-2 w-100 mb-3">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="list-container">
                                        <div class="dragitem" id="answer6-1">
                                            <label>
                                                <input type="hidden" name="question6[]" value="passion">
                                                <span><small>A</small> Being sensual and making things exciting and fun between us</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer6-2">
                                            <label>
                                                <input type="hidden" name="question6[]" value="devotion">
                                                <span><small>B</small> Being committed and staying connected so that my partner knows that they are loved</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer6-3">
                                            <label>
                                                <input type="hidden" name="question6[]" value="truth">
                                                <span><small>C</small> Being honest and wanting to fully understand the truth</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer6-4">
                                            <label>
                                                <input type="hidden" name="question6[]" value="harmony">
                                                <span><small>D</small> Being open and curious to learn more about my partner's perspectives</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer6-5">
                                            <label>
                                                <input type="hidden" name="question6[]" value="possibility">
                                                <span><small>E</small> Being generative with new ideas for our future</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer6-6">
                                            <label>
                                                <input type="hidden" name="question6[]" value="freedom">
                                                <span><small>F</small> Being encouraging about us each exploring our individual interest and desires</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer6-7">
                                            <label>
                                                <input type="hidden" name="question6[]" value="partnership">
                                                <span><small>G</small> Being aligned and making sure things are great for both of us</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer6-8">
                                            <label>
                                                <input type="hidden" name="question6[]" value="appreciation">
                                                <span><small>H</small> Being accepting of them for exactly who they are</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rankOrder-container">
                                        <div class="rankOrder top_rank">
                                            <h4>Rank Top 3 Choices</h4>
                                            <ul>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                            </ul>
                                        </div>
                                        <div class="rankOrder last_rank">
                                            <h4>Rank Last Choice</h4>
                                            <ul>
                                                <li class="draggedLast-value"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <label style="border: none;"><span class="text-danger" id="question6-error"></span></label>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next6" onClick="question6();">Next</a>
                    </div>
                </div>

                <div id="question7" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>7)</small> In my relationships, I tend to stand for...*</span>
                        </h3>
                        <p><small>Drag and drop to rank your top 3 and bottom ranked choices</small></p>
                        <div class="form type-checkbox type-2 w-100 mb-3">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="list-container">
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question7[]" value="truth">
                                                <span><small>A</small> Integrity</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question7[]" value="freedom">
                                                <span><small>B</small> Sovereignty</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question7[]" value="appreciation">
                                                <span><small>C</small> Presence</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question7[]" value="devotion">
                                                <span><small>D</small> Commitment</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question7[]" value="passion">
                                                <span><small>E</small> Passion</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question7[]" value="possibility">
                                                <span><small>F</small> Development</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question7[]" value="harmony">
                                                <span><small>G</small> Compassion</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question7[]" value="partnership">
                                                <span><small>H</small> Respect</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rankOrder-container">
                                        <div class="rankOrder top_rank">
                                            <h4>Rank Top 3 Choices</h4>
                                            <ul>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                            </ul>
                                        </div>
                                        <div class="rankOrder last_rank">
                                            <h4>Rank Last Choice</h4>
                                            <ul>
                                                <li class="draggedLast-value"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <label style="border: none;"><span class="text-danger" id="question7-error"></span></label>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next7" onClick="question7();">Next</a>
                    </div>
                </div>

                <div id="question8" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question replace8">
                            <span><small>8)</small> My Which type of relationship would you like to profile today? would say that I most often communicate by...*</span>
                        </h3>
                        <p><small>Drag and drop to rank your top 3 and bottom ranked choices</small></p>
                        <div class="form type-checkbox type-2 w-100 mb-3">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="list-container">
                                        <div class="dragitem" id="answer8-1">
                                            <label>
                                                <input type="hidden" name="question8[]" value="possibility">
                                                <span><small>A</small> Creating conversations about what can be improved</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer8-2">
                                            <label>
                                                <input type="hidden" name="question8[]" value="harmony">
                                                <span><small>B</small> Bringing empathy and understanding</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer8-3">
                                            <label>
                                                <input type="hidden" name="question8[]" value="truth">
                                                <span><small>C</small> Being direct about my thoughts and feelings</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer8-4">
                                            <label>
                                                <input type="hidden" name="question8[]" value="passion">
                                                <span><small>D</small> Initiating provocative conversations and energizing the room</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer8-5">
                                            <label>
                                                <input type="hidden" name="question8[]" value="appreciation">
                                                <span><small>E</small> Bringing gratitude and appreciation for whatever is happening</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer8-6">
                                            <label>
                                                <input type="hidden" name="question8[]" value="freedom">
                                                <span><small>F</small> Being self expressed and encouraging everyone to be themselves</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer8-7">
                                            <label>
                                                <input type="hidden" name="question8[]" value="devotion">
                                                <span><small>G</small> Being complimentary and letting them know what I love about them</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer8-8">
                                            <label>
                                                <input type="hidden" name="question8[]" value="partnership">
                                                <span><small>H</small> Being considerate and making sure everyone is heard</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rankOrder-container">
                                        <div class="rankOrder top_rank">
                                            <h4>Rank Top 3 Choices</h4>
                                            <ul>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                            </ul>
                                        </div>
                                        <div class="rankOrder last_rank">
                                            <h4>Rank Last Choice</h4>
                                            <ul>
                                                <li class="draggedLast-value"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <label style="border: none;"><span class="text-danger" id="question8-error"></span></label>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next8" onClick="question8();">Next</a>
                    </div>
                </div>

                <div id="question9" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question replace9">
                            <span><small>9)</small> When I'm trying to resolve a conflict with my Which type of relationship would you like to profile today?, what comes most naturally is to...*</span>
                        </h3>
                        <p><small>Drag and drop to rank your top 3 and bottom ranked choices</small></p>
                        <div class="form type-checkbox type-2 w-100 mb-3">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="list-container">
                                        <div class="dragitem" id="answer9-1">
                                            <label>
                                                <input type="hidden" name="question9[]" value="harmony">
                                                <span><small>A</small> De-escalate and help to restore positive feelings between us</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer9-2">
                                            <label>
                                                <input type="hidden" name="question9[]" value="truth">
                                                <span><small>B</small> Speak truthfully and acknowledge what happened</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer9-3">
                                            <label>
                                                <input type="hidden" name="question9[]" value="freedom">
                                                <span><small>C</small> Make sure we each get all our needs met</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer9-4">
                                            <label>
                                                <input type="hidden" name="question9[]" value="possibility">
                                                <span><small>D</small> Make suggestions for what might improve things</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer9-5">
                                            <label>
                                                <input type="hidden" name="question9[]" value="appreciation">
                                                <span><small>E</small> Be aware of everyone's positive intentions even if I'm hurt</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer9-6">
                                            <label>
                                                <input type="hidden" name="question9[]" value="partnership">
                                                <span><small>F</small> Seek a fair solution to help us arrive at a win-win</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer9-7">
                                            <label>
                                                <input type="hidden" name="question9[]" value="devotion">
                                                <span><small>G</small> Reaffirming my love and commitment even when it's hard</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer9-8">
                                            <label>
                                                <input type="hidden" name="question9[]" value="passion">
                                                <span><small>H</small> Help us get out of our heads and into our bodies to help change our state</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rankOrder-container">
                                        <div class="rankOrder top_rank">
                                            <h4>Rank Top 3 Choices</h4>
                                            <ul>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                            </ul>
                                        </div>
                                        <div class="rankOrder last_rank">
                                            <h4>Rank Last Choice</h4>
                                            <ul>
                                                <li class="draggedLast-value"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <label style="border: none;"><span class="text-danger" id="question9-error"></span></label>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next9" onClick="question9();">Next</a>
                    </div>
                </div>

                <div id="question10" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question replace10">
                            <span><small>10)</small> My Which type of relationship would you like to profile today? would say that the relational skill I bring most is...*</span>
                        </h3>
                        <p><small>Drag and drop to rank your top 3 and bottom ranked choices</small></p>
                        <div class="form type-checkbox type-2 w-100 mb-3">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="list-container">
                                        <div class="dragitem" id="answer10-1">
                                            <label>
                                                <input type="hidden" name="question10[]" value="possibility">
                                                <span><small>A</small> Living my values and creating an inspiring vision for our relationship</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer10-2">
                                            <label>
                                                <input type="hidden" name="question10[]" value="appreciation">
                                                <span><small>B</small> Seeing their best qualities and being grateful for what is</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer10-3">
                                            <label>
                                                <input type="hidden" name="question10[]" value="freedom">
                                                <span><small>C</small> Honoring our sovereignty and our individual needs</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer10-4">
                                            <label>
                                                <input type="hidden" name="question10[]" value="devotion">
                                                <span><small>D</small> Tracking what has my partner feel the most loved and adored</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer10-5">
                                            <label>
                                                <input type="hidden" name="question10[]" value="truth">
                                                <span><small>E</small> Honoring our truths and our boundaries</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer10-6">
                                            <label>
                                                <input type="hidden" name="question10[]" value="harmony">
                                                <span><small>F</small> Holding multiple perspectives and being attuned to what's needed</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer10-7">
                                            <label>
                                                <input type="hidden" name="question10[]" value="passion">
                                                <span><small>G</small> Keeping the spark alive and my attraction for my partner high</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer10-8">
                                            <label>
                                                <input type="hidden" name="question10[]" value="partnership">
                                                <span><small>H</small> Knowing what best serves the relationship and supporting us to be aligned</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rankOrder-container">
                                        <div class="rankOrder top_rank">
                                            <h4>Rank Top 3 Choices</h4>
                                            <ul>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                            </ul>
                                        </div>
                                        <div class="rankOrder last_rank">
                                            <h4>Rank Last Choice</h4>
                                            <ul>
                                                <li class="draggedLast-value"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <label style="border: none;"><span class="text-danger" id="question10-error"></span></label>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next10" onClick="question10();">Next</a>
                    </div>
                </div>

                <div id="part2" style="display:none;">
                    <div class="inner">
                        <h2>PART II: YOUR SHADOWS & PATTERNS</h2>
                        <p>There are 7 questions that each have 8 choices which you will put in <strong>Rank order</strong>. Rank 1st is what is most predominant and Ranked 8th (last) is what is least predominant.</p>
                        <p>TIP: It's often helpful to select an actual interaction that is a typical moment of trigger for you when answering the questions that follow so that you have a specific situation in mind.</p>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="nextpart2" onClick="part2();">Next</a>
                    </div>
                </div>

                <div id="question11" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>11)</small> When I'm triggered I most often tend to feel...*</span>
                        </h3>
                        <p><small>Drag and drop to rank your top 3 and bottom ranked choices</small></p>
                        <div class="form type-checkbox type-2 w-100 mb-3">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="list-container">
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question11[]" value="anxious">
                                                <span><small>A</small> Anxious</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question11[]" value="complaint">
                                                <span><small>B</small> Superior</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question11[]" value="addiction">
                                                <span><small>C</small> Ashamed</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question11[]" value="co-dependence">
                                                <span><small>D</small> Resentful</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question11[]" value="defense">
                                                <span><small>E</small> Defensive</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question11[]" value="avoidance">
                                                <span><small>F</small> Trapped</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question11[]" value="control">
                                                <span><small>G</small> Righteous</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question11[]" value="collapse">
                                                <span><small>H</small> Resigned</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rankOrder-container">
                                        <div class="rankOrder top_rank">
                                            <h4>Rank Top 3 Choices</h4>
                                            <ul>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                            </ul>
                                        </div>
                                        <div class="rankOrder last_rank">
                                            <h4>Rank Last Choice</h4>
                                            <ul>
                                                <li class="draggedLast-value"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <label style="border: none;"><span class="text-danger" id="question11-error"></span></label>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next11" onClick="question11();">Next</a>
                    </div>
                </div>

                <div id="question12" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>12)</small> When I'm triggered what I do most often is...*</span>
                        </h3>
                        <p><small>Drag and drop to rank your top 3 and bottom ranked choices</small></p>
                        <div class="form type-checkbox type-2 w-100 mb-3">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="list-container">
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question12[]" value="complaint">
                                                <span><small>A</small> Blame</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question12[]" value="defense">
                                                <span><small>B</small> Defend</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question12[]" value="control">
                                                <span><small>C</small> Control</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question12[]" value="collapse">
                                                <span><small>D</small> Acquiesce</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question12[]" value="anxious">
                                                <span><small>E</small> Cling</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question12[]" value="avoidance">
                                                <span><small>F</small> Disconnect</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question12[]" value="co-dependence">
                                                <span><small>G</small> Martyr</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question12[]" value="addiction">
                                                <span><small>H</small> Distract</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rankOrder-container">
                                        <div class="rankOrder top_rank">
                                            <h4>Rank Top 3 Choices</h4>
                                            <ul>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                            </ul>
                                        </div>
                                        <div class="rankOrder last_rank">
                                            <h4>Rank Last Choice</h4>
                                            <ul>
                                                <li class="draggedLast-value"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <label style="border: none;"><span class="text-danger" id="question12-error"></span></label>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next12" onClick="question12();">Next</a>
                    </div>
                </div>

                <div id="question13" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>13)</small> The most common tactics I tend to use when I'm in conflict are to...*</span>
                        </h3>
                        <p><small>Drag and drop to rank your top 3 and bottom ranked choices</small></p>
                        <div class="form type-checkbox type-2 w-100 mb-3">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="list-container">
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question13[]" value="addiction">
                                                <span><small>A</small> Hide or conceal what I'm ashamed of</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question13[]" value="complaint">
                                                <span><small>B</small> Use sharp piercing words</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question13[]" value="avoidance">
                                                <span><small>C</small> Take some space from the situation</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question13[]" value="co-dependence">
                                                <span><small>D</small> Try to fix my partner</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question13[]" value="defense">
                                                <span><small>E</small> Defend or justify my actions and choices</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question13[]" value="collapse">
                                                <span><small>F</small> Acquiesce and compromise</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question13[]" value="anxious">
                                                <span><small>G</small> Regress and cling</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question13[]" value="control">
                                                <span><small>H</small> Convince them I'm right</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rankOrder-container">
                                        <div class="rankOrder top_rank">
                                            <h4>Rank Top 3 Choices</h4>
                                            <ul>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                            </ul>
                                        </div>
                                        <div class="rankOrder last_rank">
                                            <h4>Rank Last Choice</h4>
                                            <ul>
                                                <li class="draggedLast-value"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <label style="border: none;"><span class="text-danger" id="question13-error"></span></label>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next13" onClick="question13();">Next</a>
                    </div>
                </div>

                <div id="question14" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>14)</small> The primary need I have when I'm under resourced is...*</span>
                        </h3>
                        <p><small>Drag and drop to rank your top 3 and bottom ranked choices</small></p>
                        <div class="form type-checkbox type-2 w-100 mb-3">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="list-container">
                                        <div class="dragitem" id="answer14-1">
                                            <label>
                                                <input type="hidden" name="question14[]" value="anxious">
                                                <span><small>A</small> Connection</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer14-2">
                                            <label>
                                                <input type="hidden" name="question14[]" value="collapse">
                                                <span><small>B</small> Kindness</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer14-3">
                                            <label>
                                                <input type="hidden" name="question14[]" value="avoidance">
                                                <span><small>C</small> Space</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer14-4">
                                            <label>
                                                <input type="hidden" name="question14[]" value="defense">
                                                <span><small>D</small> Acceptance</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer14-5">
                                            <label>
                                                <input type="hidden" name="question14[]" value="control">
                                                <span><small>E</small> Shared reality</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer14-6">
                                            <label>
                                                <input type="hidden" name="question14[]" value="co-dependence">
                                                <span><small>F</small> Respect</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer14-7">
                                            <label>
                                                <input type="hidden" name="question14[]" value="addiction">
                                                <span><small>G</small> Pleasure</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer14-8">
                                            <label>
                                                <input type="hidden" name="question14[]" value="complaint">
                                                <span><small>H</small> Acknowledgment</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rankOrder-container">
                                        <div class="rankOrder top_rank">
                                            <h4>Rank Top 3 Choices</h4>
                                            <ul>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                            </ul>
                                        </div>
                                        <div class="rankOrder last_rank">
                                            <h4>Rank Last Choice</h4>
                                            <ul>
                                                <li class="draggedLast-value"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <label style="border: none;"><span class="text-danger" id="question14-error"></span></label>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next14" onClick="question14();">Next</a>
                    </div>
                </div>

                <div id="question15" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>15)</small> When I'm hurt and things feel intense I tend to...*</span>
                        </h3>
                        <p><small>Drag and drop to rank your top 3 and bottom ranked choices</small></p>
                        <div class="form type-checkbox type-2 w-100 mb-3">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="list-container">
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question15[]" value="defense">
                                                <span><small>A</small> Resist and burrow deep down inside</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question15[]" value="complaint">
                                                <span><small>B</small> React with frustration and blame</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question15[]" value="avoidance">
                                                <span><small>C</small> Dissociate and focus on my needs</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question15[]" value="co-dependence">
                                                <span><small>D</small> Feel numb and make compromises to move things forward</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question15[]" value="control">
                                                <span><small>E</small> Seek control and have mental arguments in my head</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question15[]" value="addiction">
                                                <span><small>F</small> Distract myself by seeking pleasure from somewhere</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question15[]" value="collapse">
                                                <span><small>G</small> Repress and try to placate others to make it go away</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question15[]" value="anxious">
                                                <span><small>H</small> Get scared and ask for reassurance</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rankOrder-container">
                                        <div class="rankOrder top_rank">
                                            <h4>Rank Top 3 Choices</h4>
                                            <ul>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                            </ul>
                                        </div>
                                        <div class="rankOrder last_rank">
                                            <h4>Rank Last Choice</h4>
                                            <ul>
                                                <li class="draggedLast-value"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <label style="border: none;"><span class="text-danger" id="question15-error"></span></label>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next15" onClick="question15();">Next</a>
                    </div>
                </div>

                <div id="question16" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>16)</small> My biggest doubts and fears are...*</span>
                        </h3>
                        <p><small>Drag and drop to rank your top 3 and bottom ranked choices</small></p>
                        <div class="form type-checkbox type-2 w-100 mb-3">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="list-container">
                                        <div class="dragitem" id="answer16-1">
                                            <label>
                                                <input type="hidden" name="question16[]" value="co-dependence">
                                                <span><small>A</small> I'll be misled lied to or betrayed by my partner.</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer16-2">
                                            <label>
                                                <input type="hidden" name="question16[]" value="avoidance">
                                                <span><small>B</small> My partner's needs will get in the way of me having what I want.</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer16-3">
                                            <label>
                                                <input type="hidden" name="question16[]" value="anxious">
                                                <span><small>C</small> I'll end up alone. My partner will leave me.</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer16-4">
                                            <label>
                                                <input type="hidden" name="question16[]" value="defense">
                                                <span><small>D</small> I'll be unfairly judged and accused.</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer16-5">
                                            <label>
                                                <input type="hidden" name="question16[]" value="addiction">
                                                <span><small>E</small> I'll be trapped in monotony and life will be boring.</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer16-6">
                                            <label>
                                                <input type="hidden" name="question16[]" value="complaint">
                                                <span><small>F</small> I will never feel fully met and will end up disappointed.</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer16-7">
                                            <label>
                                                <input type="hidden" name="question16[]" value="collapse">
                                                <span><small>G</small> No one will care about my feelings.</span>
                                            </label>
                                        </div>
                                        <div class="dragitem" id="answer16-8">
                                            <label>
                                                <input type="hidden" name="question16[]" value="control">
                                                <span><small>H</small> I can't trust or rely on anyone but myself.</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rankOrder-container">
                                        <div class="rankOrder top_rank">
                                            <h4>Rank Top 3 Choices</h4>
                                            <ul>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                            </ul>
                                        </div>
                                        <div class="rankOrder last_rank">
                                            <h4>Rank Last Choice</h4>
                                            <ul>
                                                <li class="draggedLast-value"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <label style="border: none;"><span class="text-danger" id="question16-error"></span></label>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next16" onClick="question16();">Next</a>
                    </div>
                </div>

                <div id="question17" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>17)</small> I am sometimes repelled when others are being...*</span>
                        </h3>
                        <p><small>Drag and drop to rank your top 3 and bottom ranked choices</small></p>
                        <div class="form type-checkbox type-2 w-100 mb-3">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="list-container">
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question17[]" value="avoidance">
                                                <span><small>A</small> Needy or desperate</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question17[]" value="defense">
                                                <span><small>B</small> Superior or blamey</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question17[]" value="co-dependence">
                                                <span><small>C</small> Dishonest or betray my trust</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question17[]" value="addiction">
                                                <span><small>D</small> Over processing or pushy</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question17[]" value="complaint">
                                                <span><small>E</small> Complacent or stuck</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question17[]" value="anxious">
                                                <span><small>F</small> Selfish or entitled</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question17[]" value="collapse">
                                                <span><small>G</small> Righteous or rigid</span>
                                            </label>
                                        </div>
                                        <div class="dragitem">
                                            <label>
                                                <input type="hidden" name="question17[]" value="control">
                                                <span><small>H</small> Disempowered or collapsed</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rankOrder-container">
                                        <div class="rankOrder top_rank">
                                            <h4>Rank Top 3 Choices</h4>
                                            <ul>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                                <li class="draggedTop-value"></li>
                                            </ul>
                                        </div>
                                        <div class="rankOrder last_rank">
                                            <h4>Rank Last Choice</h4>
                                            <ul>
                                                <li class="draggedLast-value"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <label style="border: none;"><span class="text-danger" id="question17-error"></span></label>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next17" onClick="question17();">Next</a>
                    </div>
                </div>

                <div id="part3" style="display:none;">
                    <div class="inner">
                        <h2>ACCESSING YOUR PROFILE</h2>
                        <p>We'll need a few details in order to send you your results</p>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="nextpart3" onClick="part3();">Next</a>
                    </div>
                </div>

                <div id="question18" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>18)</small> What is your gender?</span>
                        </h3>
                        <p>We use this to customize your report</p>
                        <div class="form type-checkbox mb-3">
                            <label>
                                <input type="radio" name="question18" value="male">
                                <span>I identify as male</span>
                            </label>
                            <label>
                                <input type="radio" name="question18" value="female">
                                <span>I identify as female</span>
                            </label>
                            <label>
                                <input type="radio" name="question18" value="female">
                                <span>I identify as non-binary</span>
                            </label>
                            <label style="border: none;"><span class="text-danger" id="question18-error"></span></label>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next18" onClick="question18();">Next</a>
                    </div>
                </div>

                <div id="question19" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>19)</small> How have you invested in your relationships?*</span>
                        </h3>
                        <p>We use this to customize your report</p>
                        <p>Please select all that apply</p>
                        <div class="form type-checkbox mb-3">
                            <label>
                                <input type="checkbox" name="question19[]" value="I read or listen to books, articles, podcasts or videos on the topic of relationship">
                                <span>I read or listen to books, articles, podcasts or videos on the topic of relationships</span>
                            </label>
                            <label>
                                <input type="checkbox" name="question19[]" value="I follow one or more relationship experts">
                                <span>I follow one or more relationship experts</span>
                            </label>
                            <label>
                                <input type="checkbox" name="question19[]" value="I have participated in live or online events, courses, workshops, or retreats">
                                <span>I have participated in live or online events, courses, workshops, or retreats</span>
                            </label>
                            <label>
                                <input type="checkbox" name="question19[]" value="I have seen a counselor, therapist or coach who has helped me with my relationship">
                                <span>I have seen a counselor, therapist or coach who has helped me with my relationships</span>
                            </label>
                            <label>
                                <input type="checkbox" name="question19[]" value="I don't tend to invest in outside help in my relationships">
                                <span>I don't tend to invest in outside help in my relationships</span>
                            </label>
                            <label style="border: none;"><span class="text-danger" id="question19-error"></span></label>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next19" onClick="question19();">Next</a>
                    </div>
                </div>

                <div id="question20" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>20)</small> First Name*</span>
                        </h3>
                        <div class="form w-100 mb-3">
                            <input placeholder="Type your answere here..." name="question20" type="text">
                            <label style="border: none;"><span class="text-danger" id="question20-error"></span></label>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next20" onClick="question20();">Next</a>
                    </div>
                </div>

                <div id="question21" style="display:none;">
                    <div class="inner">
                        <h3 class="quiz-question">
                            <span><small>21)</small> Last Name*</span>
                        </h3>
                        <div class="form w-100 mb-3">
                            <input placeholder="Type your answere here..." name="question21" type="text">
                            <label style="border: none;"><span class="text-danger" id="question21-error"></span></label>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next21" onClick="question21();">Next</a>
                    </div>
                </div>

                <div id="question22" style="display:none;">
                    <div class="inner">
                        <div class="form">
                            <h3 class="quiz-question">
                                <span><small>22)</small> What is your email*</span>
                            </h3>
                            <div class="form w-100">
                                <input placeholder="name@example.com" name="question22" type="email">
                            </div>
                            <h3 class="quiz-question mt-5">
                                <span><small>23)</small> I consent to receive occasional email communications from Evolving Love with announcements, additional resources, special discounts, and access to courses and events.</span>
                            </h3>
                            <div class="form type-checkbox yes-no_format-2 newclass">
                                <label>
                                    <input type="checkbox" name="question23" value="agree" class="agree">
                                    <span>I agree</span>
                                </label>
                            </div>
                            <label style="border: none;"><span class="text-danger" id="question22-error"></span></label>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next22" onClick="question22();">Next</a>
                    </div>
                </div>

                <div id="question23" style="display:none;">
                    <div class="inner">
                        <div class="form">
                            <h3 class="quiz-question">
                                <span><small>24)</small> What is your cell number (SMS)?</span>
                            </h3>
                            <div class="form w-100">
                                <div class="flex-relative">
                                    <select name="countryCode" id="" name="code">
                                        <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                                        <option data-countryCode="AD" value="376">Andorra (+376)</option>
                                        <option data-countryCode="AO" value="244">Angola (+244)</option>
                                        <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                                        <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                                        <option data-countryCode="AR" value="54">Argentina (+54)</option>
                                        <option data-countryCode="AM" value="374">Armenia (+374)</option>
                                        <option data-countryCode="AW" value="297">Aruba (+297)</option>
                                        <option data-countryCode="AU" value="61">Australia (+61)</option>
                                        <option data-countryCode="AT" value="43">Austria (+43)</option>
                                        <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                                        <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                                        <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                                        <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                                        <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                                        <option data-countryCode="BY" value="375">Belarus (+375)</option>
                                        <option data-countryCode="BE" value="32">Belgium (+32)</option>
                                        <option data-countryCode="BZ" value="501">Belize (+501)</option>
                                        <option data-countryCode="BJ" value="229">Benin (+229)</option>
                                        <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                                        <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                                        <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                                        <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                                        <option data-countryCode="BW" value="267">Botswana (+267)</option>
                                        <option data-countryCode="BR" value="55">Brazil (+55)</option>
                                        <option data-countryCode="BN" value="673">Brunei (+673)</option>
                                        <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                                        <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                                        <option data-countryCode="BI" value="257">Burundi (+257)</option>
                                        <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                                        <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                                        <option data-countryCode="CA" value="1">Canada (+1)</option>
                                        <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                                        <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                                        <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                                        <option data-countryCode="CL" value="56">Chile (+56)</option>
                                        <option data-countryCode="CN" value="86">China (+86)</option>
                                        <option data-countryCode="CO" value="57">Colombia (+57)</option>
                                        <option data-countryCode="KM" value="269">Comoros (+269)</option>
                                        <option data-countryCode="CG" value="242">Congo (+242)</option>
                                        <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                                        <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                                        <option data-countryCode="HR" value="385">Croatia (+385)</option>
                                        <option data-countryCode="CU" value="53">Cuba (+53)</option>
                                        <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                                        <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                                        <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                                        <option data-countryCode="DK" value="45">Denmark (+45)</option>
                                        <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                                        <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                                        <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                                        <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                                        <option data-countryCode="EG" value="20">Egypt (+20)</option>
                                        <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                                        <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                                        <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                                        <option data-countryCode="EE" value="372">Estonia (+372)</option>
                                        <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                                        <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                                        <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                                        <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                                        <option data-countryCode="FI" value="358">Finland (+358)</option>
                                        <option data-countryCode="FR" value="33">France (+33)</option>
                                        <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                                        <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                                        <option data-countryCode="GA" value="241">Gabon (+241)</option>
                                        <option data-countryCode="GM" value="220">Gambia (+220)</option>
                                        <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                                        <option data-countryCode="DE" value="49">Germany (+49)</option>
                                        <option data-countryCode="GH" value="233">Ghana (+233)</option>
                                        <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                                        <option data-countryCode="GR" value="30">Greece (+30)</option>
                                        <option data-countryCode="GL" value="299">Greenland (+299)</option>
                                        <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                                        <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                                        <option data-countryCode="GU" value="671">Guam (+671)</option>
                                        <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                                        <option data-countryCode="GN" value="224">Guinea (+224)</option>
                                        <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                                        <option data-countryCode="GY" value="592">Guyana (+592)</option>
                                        <option data-countryCode="HT" value="509">Haiti (+509)</option>
                                        <option data-countryCode="HN" value="504">Honduras (+504)</option>
                                        <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                                        <option data-countryCode="HU" value="36">Hungary (+36)</option>
                                        <option data-countryCode="IS" value="354">Iceland (+354)</option>
                                        <option data-countryCode="IN" value="91">India (+91)</option>
                                        <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                                        <option data-countryCode="IR" value="98">Iran (+98)</option>
                                        <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                                        <option data-countryCode="IE" value="353">Ireland (+353)</option>
                                        <option data-countryCode="IL" value="972">Israel (+972)</option>
                                        <option data-countryCode="IT" value="39">Italy (+39)</option>
                                        <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                                        <option data-countryCode="JP" value="81">Japan (+81)</option>
                                        <option data-countryCode="JO" value="962">Jordan (+962)</option>
                                        <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                                        <option data-countryCode="KE" value="254">Kenya (+254)</option>
                                        <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                                        <option data-countryCode="KP" value="850">Korea North (+850)</option>
                                        <option data-countryCode="KR" value="82">Korea South (+82)</option>
                                        <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                                        <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                                        <option data-countryCode="LA" value="856">Laos (+856)</option>
                                        <option data-countryCode="LV" value="371">Latvia (+371)</option>
                                        <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                                        <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                                        <option data-countryCode="LR" value="231">Liberia (+231)</option>
                                        <option data-countryCode="LY" value="218">Libya (+218)</option>
                                        <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                                        <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                                        <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                                        <option data-countryCode="MO" value="853">Macao (+853)</option>
                                        <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                                        <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                                        <option data-countryCode="MW" value="265">Malawi (+265)</option>
                                        <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                                        <option data-countryCode="MV" value="960">Maldives (+960)</option>
                                        <option data-countryCode="ML" value="223">Mali (+223)</option>
                                        <option data-countryCode="MT" value="356">Malta (+356)</option>
                                        <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                                        <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                                        <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                                        <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                                        <option data-countryCode="MX" value="52">Mexico (+52)</option>
                                        <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                                        <option data-countryCode="MD" value="373">Moldova (+373)</option>
                                        <option data-countryCode="MC" value="377">Monaco (+377)</option>
                                        <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                                        <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                                        <option data-countryCode="MA" value="212">Morocco (+212)</option>
                                        <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                                        <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                                        <option data-countryCode="NA" value="264">Namibia (+264)</option>
                                        <option data-countryCode="NR" value="674">Nauru (+674)</option>
                                        <option data-countryCode="NP" value="977">Nepal (+977)</option>
                                        <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                                        <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                                        <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                                        <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                                        <option data-countryCode="NE" value="227">Niger (+227)</option>
                                        <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                                        <option data-countryCode="NU" value="683">Niue (+683)</option>
                                        <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                                        <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                                        <option data-countryCode="NO" value="47">Norway (+47)</option>
                                        <option data-countryCode="OM" value="968">Oman (+968)</option>
                                        <option data-countryCode="PW" value="680">Palau (+680)</option>
                                        <option data-countryCode="PA" value="507">Panama (+507)</option>
                                        <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                                        <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                                        <option data-countryCode="PE" value="51">Peru (+51)</option>
                                        <option data-countryCode="PH" value="63">Philippines (+63)</option>
                                        <option data-countryCode="PL" value="48">Poland (+48)</option>
                                        <option data-countryCode="PT" value="351">Portugal (+351)</option>
                                        <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                                        <option data-countryCode="QA" value="974">Qatar (+974)</option>
                                        <option data-countryCode="RE" value="262">Reunion (+262)</option>
                                        <option data-countryCode="RO" value="40">Romania (+40)</option>
                                        <option data-countryCode="RU" value="7">Russia (+7)</option>
                                        <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                                        <option data-countryCode="SM" value="378">San Marino (+378)</option>
                                        <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                                        <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                                        <option data-countryCode="SN" value="221">Senegal (+221)</option>
                                        <option data-countryCode="CS" value="381">Serbia (+381)</option>
                                        <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                                        <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                                        <option data-countryCode="SG" value="65">Singapore (+65)</option>
                                        <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                                        <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                                        <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                                        <option data-countryCode="SO" value="252">Somalia (+252)</option>
                                        <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                                        <option data-countryCode="ES" value="34">Spain (+34)</option>
                                        <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                                        <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                                        <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                                        <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                                        <option data-countryCode="SD" value="249">Sudan (+249)</option>
                                        <option data-countryCode="SR" value="597">Suriname (+597)</option>
                                        <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                                        <option data-countryCode="SE" value="46">Sweden (+46)</option>
                                        <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                                        <option data-countryCode="SI" value="963">Syria (+963)</option>
                                        <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                                        <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                                        <option data-countryCode="TH" value="66">Thailand (+66)</option>
                                        <option data-countryCode="TG" value="228">Togo (+228)</option>
                                        <option data-countryCode="TO" value="676">Tonga (+676)</option>
                                        <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                                        <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                                        <option data-countryCode="TR" value="90">Turkey (+90)</option>
                                        <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                                        <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                                        <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                        <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                                        <option data-countryCode="UG" value="256">Uganda (+256)</option>
                                        <option data-countryCode="GB" value="44">UK (+44)</option>
                                        <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                                        <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                                        <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                                        <option data-countryCode="US" value="1" selected>USA (+1)</option>
                                        <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                        <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                        <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                        <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                        <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                        <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                        <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                        <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                        <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                        <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                        <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                        <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                                    </select>
                                    <input placeholder="(555) 555 - 5555" name="number" type="number">
                                </div>
                            </div>
                            <h3 class="quiz-question mt-5">
                                <span><small>25)</small> I give my consent to Evolving Love to send occasional SMS text reminders. I can opt-out anytime. Standard text messaging rates may apply.</span>
                            </h3>
                            <div class="form type-checkbox yes-no_format-2 newclass">
                                <label>
                                    <input type="checkbox" name="question24" value="agree" class="agree">
                                    <span>I agree</span>
                                </label>
                            </div>
                            <label style="border: none;"><span class="text-danger" id="question23-error"></span></label>
                        </div>
                        <button type="submit" class="btn btn-white mt-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="bottom-links">
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn1" style="display:none;" onClick="prequestion1();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn2" style="display:none;" onClick="prequestion2();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn3" style="display:none;" onClick="prequestion3();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn4" style="display:none;" onClick="prequestion4();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn5" style="display:none;" onClick="prequestion5();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn6" style="display:none;" onClick="prequestion6();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn7" style="display:none;" onClick="prequestion7();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn8" style="display:none;" onClick="prequestion8();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn9" style="display:none;" onClick="prequestion9();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn10" style="display:none;" onClick="prequestion10();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn11" style="display:none;" onClick="prequestion11();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn12" style="display:none;" onClick="prequestion12();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn13" style="display:none;" onClick="prequestion13();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn14" style="display:none;" onClick="prequestion14();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn15" style="display:none;" onClick="prequestion15();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn16" style="display:none;" onClick="prequestion16();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn17" style="display:none;" onClick="prequestion17();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn18" style="display:none;" onClick="prequestion18();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn19" style="display:none;" onClick="prequestion19();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn20" style="display:none;" onClick="prequestion20();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn21" style="display:none;" onClick="prequestion21();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn22" style="display:none;" onClick="prequestion22();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn23" style="display:none;" onClick="prequestion23();"><i class="fas fa-angle-up"></i></a>
            <a class="btn btn-green prev" href="javascript:void(0);" id="qstn24" style="display:none;" onClick="prequestion24();"><i class="fas fa-angle-up"></i></a>

            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn1" onClick="question1();"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn2" onClick="question2();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn3" onClick="question3();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn4" onClick="question4();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn5" onClick="part1();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn6" onClick="question5();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn7" onClick="question6();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn8" onClick="question7();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn9" onClick="question8();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn10" onClick="question9();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn11" onClick="question10();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqpart2" onClick="part2();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn12" onClick="question11();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn13" onClick="question12();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn14" onClick="question13();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn15" onClick="question14();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn16" onClick="question15();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn17" onClick="question16();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn18" onClick="question17();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqpart3" onClick="part3();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn19" onClick="question18();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn20" onClick="question19();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn21" onClick="question20();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn22" onClick="question21();" style="display:none;"><i class="fas fa-angle-down"></i></a>
            <a class="btn btn-green next" href="javascript:void(0);" id="nextqstn23" onClick="question22();" style="display:none;"><i class="fas fa-angle-down"></i></a>
        </div>
    </section>
</main>
<style>
.quiz-screen .form.type-checkbox.yes-no label input[type=checkbox]:after, .quiz-screen .form.type-checkbox.yes-no label input[type=radio]:after {
    content: "N";
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    
$("#question-submit").submit(function (e) {
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    e.preventDefault();
    var formData = $("#question-submit").serialize();
    $.ajax({
      url: "/submit-form",
      type: "POST",
      dataType: "json",
      data: formData,
      success: function (data) {
        if (data.status == 1) {
            window.location = "/thankyou";          
        }

      },
    });
});
</script>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{asset('js/jquery-ui-touch-punch-min.js')}}"></script>
<script src="{{asset('js/bundle.min.js')}}"></script>
<script src="{{asset('js/quiz.js')}}"></script>

<!-- For Developer use -->
<script src="{{asset('js/developer.js')}}"></script>

<style>
    .text-danger {
        color: #fff !important;
    }
</style>
</body>

</html>