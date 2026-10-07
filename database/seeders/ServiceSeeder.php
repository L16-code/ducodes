<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Categories for the existing config-driven services, used to group them
     * in the admin panel and the header mega-menu.
     */
    private array $existingCategories = [
        'laravel-development' => 'Development',
        'ai-development' => 'AI & Machine Learning',
        'custom-software-development' => 'Development',
        'web-development' => 'Development',
        'mobile-app-development' => 'Development',
        'zoho-development' => 'Business Integrations',
        'salesforce-development' => 'Business Integrations',
        'hubspot-development' => 'Business Integrations',
        'devops' => 'Development',
        'crm-erp-integration' => 'Business Integrations',
        'power-bi-data-solutions' => 'Design & Data',
        'ui-ux-design' => 'Design & Data',
    ];

    public function run(): void
    {
        $sortOrder = 0;

        // Migrate the original config-driven services into the database first,
        // preserving their exact existing content.
        $existing = require config_path('service_pages.php');

        foreach ($existing as $slug => $service) {
            Service::updateOrCreate(
                ['slug' => $slug],
                [
                    'category' => $this->existingCategories[$slug] ?? 'Development',
                    'title' => $service['title'],
                    'meta_description' => $service['meta_description'],
                    'tagline' => $service['tagline'],
                    'quick_answer' => $service['quick_answer'],
                    'intro' => $service['intro'],
                    'why_ducodes' => $service['why_ducodes'],
                    'process' => $service['process'],
                    'tech_stack' => $service['tech_stack'],
                    'related' => $service['related'] ?? [],
                    'hire_developer_slug' => $service['hire_developer_slug'] ?? null,
                    'sort_order' => $sortOrder++,
                    'is_active' => true,
                ]
            );
        }

        foreach ($this->newAiServices() as $slug => $service) {
            Service::updateOrCreate(
                ['slug' => $slug],
                array_merge($service, [
                    'category' => 'AI & Machine Learning',
                    'sort_order' => $sortOrder++,
                    'is_active' => true,
                ])
            );
        }
    }

    private function newAiServices(): array
    {
        return [
            'ai-chatbot-development' => [
                'title' => 'AI Chatbot Development Company',
                'meta_description' => 'AI chatbot development for websites, support, and internal tools — grounded in your real data and built with a clear human handoff, not a generic FAQ bot.',
                'tagline' => 'Chatbots that know when to answer and when to hand off to a person.',
                'quick_answer' => 'AI chatbot development is building a conversational interface — for customer support, lead qualification, or internal use — powered by a large language model connected to your actual data. As an AI chatbot development company, DuCodes scopes every bot around what it should answer directly, what it should escalate, and how it fails safely when it doesn\'t know.',
                'intro' => [
                    'Most "AI chatbot" disappointment comes from one root cause: a bot that answers confidently instead of accurately. We build chatbots that are grounded in your own documentation, product data, or support history through retrieval, so answers come from your actual content rather than the model\'s general training — and we design explicit escalation paths for anything outside that scope.',
                    'This covers customer-facing support widgets, lead-qualification bots for a marketing site, and internal chatbots that let a team query internal documentation or systems without digging through a wiki or ticketing tool.',
                ],
                'why_ducodes' => [
                    ['title' => 'Grounded answers, not guesses', 'body' => 'Retrieval against your real documents/data means the bot answers from what you actually publish, not from whatever the underlying model assumes.'],
                    ['title' => 'A defined escalation path', 'body' => 'Every chatbot we build has an explicit "I\'m not sure, let me connect you to a person" behavior — we scope this before writing a single prompt.'],
                    ['title' => 'Built into your existing stack', 'body' => 'The chatbot lives inside your actual website or app and can read from (and where appropriate, write to) your CRM or support system, instead of being a bolted-on third-party widget.'],
                    ['title' => 'Honest about limits', 'body' => 'We\'ll tell you directly if a rules-based flow or a better help-center search would solve your actual problem more reliably than a chatbot.'],
                ],
                'process' => [
                    ['title' => 'Scope the conversation', 'body' => 'What should the bot handle end-to-end, what should it escalate, and what does a good vs. bad answer look like?'],
                    ['title' => 'Connect your data', 'body' => 'Documentation, product catalog, or support history indexed for retrieval so answers are grounded in what you actually publish.'],
                    ['title' => 'Prototype against real questions', 'body' => 'Testing with real (or realistic) customer questions before committing to a full build.'],
                    ['title' => 'Build with guardrails', 'body' => 'Rate limiting, confidence thresholds, and monitoring so a bad answer gets caught, not just shipped.'],
                    ['title' => 'Launch and tune', 'body' => 'Real usage surfaces gaps in the knowledge base and prompts — we iterate on both after launch, not just before it.'],
                ],
                'tech_stack' => ['OpenAI / Anthropic / Gemini APIs', 'LangChain', 'Vector databases (pgvector, Pinecone)', 'Python', 'Node.js / Laravel backend integration'],
                'related' => ['ai-agent-development', 'llm-development', 'ai-development'],
                'hire_developer_slug' => 'gen-ai',
            ],

            'ai-agent-development' => [
                'title' => 'Custom AI Agent Development',
                'meta_description' => 'AI agents that take multi-step action — not just answer questions — built with tool access scoped to what they should actually be allowed to do.',
                'tagline' => 'AI agents that do the task, not just describe how to do it.',
                'quick_answer' => 'An AI agent is a system that can plan and carry out a multi-step task using tools — looking things up, calling an API, updating a record — rather than just generating text in response to a single prompt. DuCodes builds custom AI agents scoped around one real workflow at a time, with explicit limits on what actions the agent is allowed to take on its own.',
                'intro' => [
                    'The difference between a chatbot and an agent is action: a chatbot answers a question, an agent completes a task — checking inventory, drafting and sending a follow-up, updating a CRM record, triaging a support ticket. That requires giving a model access to tools (APIs, databases, internal systems) and deciding, deliberately, what it\'s allowed to do unsupervised versus what needs a human to approve first.',
                    'We build agents around one concrete workflow at a time rather than a general-purpose "do anything" assistant — narrower scope makes the failure modes predictable, and predictable failure modes are what make an agent safe to actually deploy.',
                ],
                'why_ducodes' => [
                    ['title' => 'Scoped tool access', 'body' => 'An agent only gets the tools and permissions it actually needs for its task — we don\'t wire up broad system access for convenience.'],
                    ['title' => 'Human-in-the-loop where it matters', 'body' => 'Actions with real consequences (sending an email, charging a card, deleting a record) get an approval step by default unless you explicitly want full autonomy.'],
                    ['title' => 'Built to fail safely', 'body' => 'When the agent can\'t complete a step confidently, it stops and reports rather than guessing its way through the rest of the task.'],
                    ['title' => 'One workflow, done well', 'body' => 'We\'d rather ship an agent that reliably handles one real process than a general assistant that handles many processes unpredictably.'],
                ],
                'process' => [
                    ['title' => 'Map the workflow', 'body' => 'The exact steps a human currently takes to complete this task, and which of those steps are safe to automate.'],
                    ['title' => 'Define tools and permissions', 'body' => 'What APIs/systems the agent needs access to, and exactly what it\'s allowed to do with that access.'],
                    ['title' => 'Build with checkpoints', 'body' => 'Approval steps for consequential actions, and clear logging of every action the agent takes.'],
                    ['title' => 'Test against edge cases', 'body' => 'Deliberately running the agent through the unusual inputs and failure paths, not just the happy path.'],
                    ['title' => 'Launch with monitoring', 'body' => 'Ongoing visibility into what the agent is doing in production, so unexpected behavior gets caught quickly.'],
                ],
                'tech_stack' => ['LangGraph', 'CrewAI', 'Python', 'OpenAI / Anthropic function calling', 'Vector databases', 'Node.js orchestration'],
                'related' => ['ai-chatbot-development', 'ai-automation-services', 'mcp-development'],
                'hire_developer_slug' => 'gen-ai',
            ],

            'rag-development' => [
                'title' => 'RAG Development Services',
                'meta_description' => 'Retrieval-augmented generation development — grounding an LLM in your actual documents and data, so answers come from your content, not a guess.',
                'tagline' => 'LLM answers grounded in your actual documents and data — not the model\'s general knowledge.',
                'quick_answer' => 'RAG (retrieval-augmented generation) is the technique of retrieving relevant chunks of your own documents or data at query time and feeding them to an LLM as context, so its answer is grounded in your actual content instead of its general training. DuCodes builds RAG pipelines — document ingestion, chunking, embeddings, retrieval, and generation — for chatbots, internal search, and AI features that need to be accurate about your specific business.',
                'intro' => [
                    'A general-purpose LLM doesn\'t know your product catalog, your internal policies, or last week\'s support tickets. RAG solves that by retrieving the relevant pieces of your own data at query time and including them in what the model sees before it answers — so the answer is grounded in your actual content rather than the model\'s general training.',
                    'The quality of a RAG system depends far more on the retrieval step — how documents are chunked, embedded, and ranked — than on which LLM sits at the end of the pipeline. We spend most of our effort there: getting the right context in front of the model, tuned against real questions your users actually ask.',
                ],
                'why_ducodes' => [
                    ['title' => 'Retrieval quality first', 'body' => 'Chunking strategy, embedding choice, and ranking logic get tuned against your real content and real user questions — not left at framework defaults.'],
                    ['title' => 'Evaluated against real queries', 'body' => 'We test retrieval accuracy against a representative set of real questions before considering the system done, not just a handful of demo queries.'],
                    ['title' => 'Works with what you already have', 'body' => 'PDFs, help center articles, database records, internal wikis — we build ingestion pipelines around your actual document sources, however messy they are.'],
                    ['title' => 'Honest about what RAG can\'t fix', 'body' => 'If your underlying documentation is out of date or contradictory, RAG will surface that clearly rather than fix it — we\'ll tell you when the real problem is content, not retrieval.'],
                ],
                'process' => [
                    ['title' => 'Content audit', 'body' => 'What documents/data actually need to be retrievable, and how current and consistent they are.'],
                    ['title' => 'Ingestion & chunking design', 'body' => 'How documents get split and embedded so retrieval returns genuinely relevant context, not just keyword matches.'],
                    ['title' => 'Retrieval tuning', 'body' => 'Testing and adjusting retrieval against real questions before wiring in generation.'],
                    ['title' => 'Generation & guardrails', 'body' => 'Prompting the LLM to answer only from retrieved context, with a defined fallback when nothing relevant is found.'],
                    ['title' => 'Evaluation & iteration', 'body' => 'Ongoing measurement of answer accuracy against real usage, since document sets and questions change over time.'],
                ],
                'tech_stack' => ['pgvector / Pinecone', 'LangChain', 'OpenAI / Anthropic embeddings', 'Python', 'Node.js / Laravel integration layers'],
                'related' => ['llm-development', 'ai-agent-development', 'ai-development'],
                'hire_developer_slug' => 'gen-ai',
            ],

            'langgraph-development' => [
                'title' => 'LangGraph Development',
                'meta_description' => 'LangGraph development for stateful, multi-step AI agent workflows — built for teams that need reliable, debuggable agent behavior in production.',
                'tagline' => 'Multi-step agent workflows that are structured enough to debug, not a black box.',
                'quick_answer' => 'LangGraph is a framework for building AI agents as explicit state graphs — defining the steps, branches, and loops an agent can take, rather than leaving that logic implicit inside a single prompt. DuCodes uses LangGraph when an agent\'s workflow has real branching logic or needs to maintain state across multiple steps, since it makes that behavior visible and debuggable rather than buried in prompt engineering.',
                'intro' => [
                    'A lot of "AI agent" implementations are really just a loop around a single prompt, which works until the task has real branching logic — different paths depending on what happens at each step, retries, or state that needs to persist across a long-running process. LangGraph models that explicitly as a graph of nodes and edges, so the actual logic of the agent is visible in code rather than implied by prompt wording.',
                    'We reach for LangGraph specifically when a workflow needs that structure — multi-step approval flows, agents that loop until a condition is met, or processes that need to resume from a checkpoint after a failure — rather than defaulting to it for every agent project.',
                ],
                'why_ducodes' => [
                    ['title' => 'We use it where it earns its keep', 'body' => 'LangGraph adds real value for genuinely stateful, branching workflows — for a simple single-step task, a simpler implementation is faster to build and easier to maintain.'],
                    ['title' => 'Debuggable by design', 'body' => 'Because the workflow is an explicit graph, we can trace exactly which node an agent was in when something went wrong, instead of guessing from a prompt.'],
                    ['title' => 'Checkpointing for long-running tasks', 'body' => 'Workflows that take real time or involve external steps can persist state and resume, rather than starting over on failure.'],
                    ['title' => 'Python-first, integrated with your stack', 'body' => 'LangGraph agents get wired into your actual backend (Laravel, Node.js) via an API layer, not left running as a standalone script.'],
                ],
                'process' => [
                    ['title' => 'Map the state machine', 'body' => 'What are the actual steps, decision points, and loops this agent needs to handle?'],
                    ['title' => 'Design the graph', 'body' => 'Nodes, edges, and conditional logic defined explicitly before any prompting begins.'],
                    ['title' => 'Build & wire in tools', 'body' => 'Each node gets the specific tool access and logic it needs — not broad, shared access across the whole graph.'],
                    ['title' => 'Test branch by branch', 'body' => 'Every path through the graph tested individually, including failure and retry paths.'],
                    ['title' => 'Deploy with checkpointing', 'body' => 'State persistence so long-running or interrupted workflows can resume rather than restart.'],
                ],
                'tech_stack' => ['LangGraph', 'Python', 'LangChain', 'OpenAI / Anthropic APIs', 'Redis / Postgres for state persistence'],
                'related' => ['ai-agent-development', 'crewai-development', 'llm-development'],
                'hire_developer_slug' => 'gen-ai',
            ],

            'crewai-development' => [
                'title' => 'CrewAI Development',
                'meta_description' => 'CrewAI development for multi-agent systems — specialized AI agents collaborating on a task, each with a defined role, tools, and scope.',
                'tagline' => 'Multiple specialized AI agents working one task, each with a clearly defined role.',
                'quick_answer' => 'CrewAI is a framework for building multi-agent systems, where several specialized AI agents — each with its own role, goal, and tools — collaborate on a task, coordinated by a process that defines how they hand work to each other. DuCodes uses CrewAI when a task genuinely benefits from being split across specialized roles — research, drafting, review — rather than handled by one generalist agent.',
                'intro' => [
                    'Some tasks are better split across specialists than handled by one agent trying to do everything: a research agent that gathers information, a drafting agent that writes from it, a review agent that checks the output against specific criteria. CrewAI structures that as a "crew" — agents with defined roles and goals, coordinated through a process that governs how work moves between them.',
                    'We use CrewAI specifically for tasks where role specialization improves the result — content pipelines, research-and-summarize workflows, multi-step qualification processes — not as a default architecture for every agent project.',
                ],
                'why_ducodes' => [
                    ['title' => 'Roles scoped to a real division of labor', 'body' => 'Each agent in the crew gets a role and tools that match a genuine specialization in the task, not an arbitrary split.'],
                    ['title' => 'We test the handoffs, not just each agent alone', 'body' => 'The failure point in multi-agent systems is usually the handoff between agents — we test those transitions explicitly.'],
                    ['title' => 'Right-sized complexity', 'body' => 'We\'ll recommend a single well-scoped agent instead of a crew when the task doesn\'t genuinely need multiple specialized roles.'],
                    ['title' => 'Integrated with your systems', 'body' => 'The crew\'s output connects into your actual workflow — a CRM, a CMS, a support queue — not just returned as isolated text.'],
                ],
                'process' => [
                    ['title' => 'Define the roles', 'body' => 'What specialized tasks genuinely benefit from being handled by separate agents, and what each one\'s goal and tools should be.'],
                    ['title' => 'Design the process', 'body' => 'How work and context hand off between agents, and what the final output looks like.'],
                    ['title' => 'Build each agent', 'body' => 'Prompts, tools, and constraints scoped individually per role.'],
                    ['title' => 'Test the full crew', 'body' => 'Running end-to-end tasks through the whole crew, with particular attention to the handoff points between agents.'],
                    ['title' => 'Integrate & monitor', 'body' => 'Output wired into your actual systems, with logging so you can see what each agent contributed.'],
                ],
                'tech_stack' => ['CrewAI', 'Python', 'OpenAI / Anthropic APIs', 'LangChain tools', 'Vector databases'],
                'related' => ['ai-agent-development', 'langgraph-development', 'ai-automation-services'],
                'hire_developer_slug' => 'gen-ai',
            ],

            'mcp-development' => [
                'title' => 'MCP Development',
                'meta_description' => 'Model Context Protocol (MCP) server development — securely connecting AI assistants like Claude to your internal tools, data, and systems.',
                'tagline' => 'Give Claude and other AI assistants secure, structured access to your actual systems.',
                'quick_answer' => 'MCP (Model Context Protocol) is an open standard for connecting AI assistants to external tools and data sources through a common, structured interface, instead of a custom integration per assistant. DuCodes builds MCP servers that expose a business\'s internal tools, documents, or APIs to AI assistants like Claude in a secure, scoped way.',
                'intro' => [
                    'AI assistants are far more useful when they can actually reach your data and tools — your internal docs, your database, your ticketing system — instead of only working with what\'s typed into a chat window. MCP standardizes how that connection happens, so an AI assistant can discover and call your tools through a common protocol instead of requiring a bespoke integration for every assistant it\'s used with.',
                    'We build MCP servers that expose exactly the tools and data you want an AI assistant to access — read-only lookups, scoped write actions, or both — with the same care around permissions and guardrails we apply to any AI agent work.',
                ],
                'why_ducodes' => [
                    ['title' => 'Scoped access by design', 'body' => 'An MCP server we build exposes only the specific tools and data you\'ve chosen to make available — not blanket access to your systems.'],
                    ['title' => 'Standard-based, not a one-off integration', 'body' => 'Building to the MCP spec means the same server works with any MCP-compatible AI assistant, not just one vendor\'s product.'],
                    ['title' => 'Real authentication and audit logging', 'body' => 'Every call an AI assistant makes through your MCP server is authenticated and logged, so you know what was accessed and when.'],
                    ['title' => 'Practical about what to expose', 'body' => 'We\'ll help you decide which internal tools are actually useful to expose to an AI assistant, rather than wiring up everything by default.'],
                ],
                'process' => [
                    ['title' => 'Identify the use case', 'body' => 'What should an AI assistant actually be able to look up or do in your systems, and for whom?'],
                    ['title' => 'Define tools and scope', 'body' => 'Which internal APIs, documents, or actions get exposed, and what permissions gate each one.'],
                    ['title' => 'Build the MCP server', 'body' => 'Implementing the protocol\'s tool and resource interfaces against your actual backend.'],
                    ['title' => 'Secure & test', 'body' => 'Authentication, rate limiting, and testing against both expected and adversarial usage.'],
                    ['title' => 'Deploy & monitor', 'body' => 'Logging and monitoring so you can see exactly what\'s being accessed through the server after launch.'],
                ],
                'tech_stack' => ['Model Context Protocol (MCP)', 'Python / Node.js', 'OAuth / API key authentication', 'Existing internal APIs', 'Claude / MCP-compatible clients'],
                'related' => ['ai-agent-development', 'claude-api-integration', 'llm-development'],
                'hire_developer_slug' => 'gen-ai',
            ],

            'openai-integration' => [
                'title' => 'OpenAI Integration',
                'meta_description' => 'OpenAI API integration — GPT models, function calling, and the Assistants API wired into your product with real cost and reliability controls.',
                'tagline' => 'GPT models integrated with real guardrails around cost, reliability, and failure handling.',
                'quick_answer' => 'OpenAI integration means wiring GPT models into a product or workflow through OpenAI\'s API — chat completions, function calling, structured outputs, or the Assistants API. DuCodes handles this integration work end to end, including the parts that matter after launch: cost monitoring, rate limiting, and fallback behavior when the API is slow or unavailable.',
                'intro' => [
                    'Calling the OpenAI API is the easy part; building something reliable around it is where most of the actual engineering work is. That means handling rate limits and timeouts gracefully, monitoring token costs before they surprise you, structuring outputs so your application can actually use them, and deciding what happens when the API is slow, down, or returns something unexpected.',
                    'We integrate OpenAI\'s models into existing products and new builds alike — chat features, document processing, structured data extraction via function calling — treating the API as one component of a larger system rather than the whole solution.',
                ],
                'why_ducodes' => [
                    ['title' => 'Cost is designed in, not discovered later', 'body' => 'Token usage monitoring and sensible model selection (not defaulting to the most expensive model for every call) are part of the build.'],
                    ['title' => 'Handles API failures gracefully', 'body' => 'Timeouts, rate limits, and outages get a defined fallback behavior instead of surfacing as a broken feature.'],
                    ['title' => 'Structured outputs you can actually use', 'body' => 'Function calling and structured output modes get set up so responses are usable directly in your application, not just parsed by hope.'],
                    ['title' => 'Model-agnostic where it matters', 'body' => 'We\'ll flag where switching to a different model (or a different provider entirely) would genuinely serve you better, rather than assuming OpenAI is always the right choice.'],
                ],
                'process' => [
                    ['title' => 'Scope the use case', 'body' => 'What exactly the integration needs to do, and the acceptable cost and latency for it.'],
                    ['title' => 'Design the integration', 'body' => 'Function calling schema, prompt structure, and where this fits in your existing backend.'],
                    ['title' => 'Build with guardrails', 'body' => 'Rate limiting, retries, timeout handling, and cost monitoring built in from the start.'],
                    ['title' => 'Test against real inputs', 'body' => 'Realistic and edge-case inputs, not just the happy path, before considering it production-ready.'],
                    ['title' => 'Monitor after launch', 'body' => 'Usage and cost tracking so you see how the integration performs against real traffic.'],
                ],
                'tech_stack' => ['OpenAI API (GPT models, Assistants API)', 'Function calling / structured outputs', 'Python / Node.js', 'Laravel integration layers', 'Usage & cost monitoring'],
                'related' => ['llm-development', 'claude-api-integration', 'gemini-api-integration'],
                'hire_developer_slug' => 'gen-ai',
            ],

            'claude-api-integration' => [
                'title' => 'Claude API Integration',
                'meta_description' => 'Claude API integration — Anthropic\'s models, tool use, and long-context features wired into your product with real guardrails.',
                'tagline' => 'Claude\'s tool use and long-context strengths integrated into a real product workflow.',
                'quick_answer' => 'Claude API integration means building features on top of Anthropic\'s Claude models — using tool use (function calling), long-context document processing, or structured outputs through the API. DuCodes integrates Claude where its particular strengths (careful instruction-following, long context windows, tool use) genuinely fit the task, alongside the same cost and reliability guardrails we build for any LLM integration.',
                'intro' => [
                    'Claude has particular strengths worth building around directly: long context windows for processing large documents in one pass, careful instruction-following for tasks that need precise constraints, and a tool-use interface for connecting the model to your own functions and data. We integrate Claude specifically where those strengths matter to your use case, rather than treating all LLM providers as interchangeable.',
                    'As with any LLM integration, the API call itself is the smaller part of the work — the real engineering is in prompt design, tool schemas, handling long-running or large-document requests, and building fallback behavior for when a response is uncertain or the API is unavailable.',
                ],
                'why_ducodes' => [
                    ['title' => 'We pick Claude where it actually fits', 'body' => 'Long-document analysis, precise instruction-following tasks, and tool-use-heavy agents are places Claude\'s design genuinely helps — we\'ll say so when it\'s the better fit, not by default brand preference.'],
                    ['title' => 'Tool use built and tested properly', 'body' => 'Claude\'s tool-use interface gets wired to your actual functions and data with real testing, not just a demo call.'],
                    ['title' => 'Handles long-context workloads', 'body' => 'Large document processing (contracts, reports, transcripts) is designed around Claude\'s context window rather than chunked awkwardly to fit a smaller model.'],
                    ['title' => 'Same reliability standards as any integration', 'body' => 'Rate limiting, retries, cost monitoring, and fallback behavior are part of the build regardless of which model provider we\'re integrating.'],
                ],
                'process' => [
                    ['title' => 'Scope the use case', 'body' => 'What the feature needs to do, and whether Claude\'s specific strengths (context length, tool use, instruction-following) are the right fit.'],
                    ['title' => 'Design the integration', 'body' => 'Tool schemas, prompt structure, and context handling for your specific documents or workflow.'],
                    ['title' => 'Build with guardrails', 'body' => 'Rate limiting, retries, and cost monitoring, same as any production LLM integration.'],
                    ['title' => 'Test against real documents/inputs', 'body' => 'Using your actual content, not synthetic examples, before considering it production-ready.'],
                    ['title' => 'Monitor after launch', 'body' => 'Tracking usage, cost, and output quality against real traffic.'],
                ],
                'tech_stack' => ['Anthropic Claude API', 'Tool use / function calling', 'Python / Node.js', 'Laravel integration layers', 'Long-context document pipelines'],
                'related' => ['openai-integration', 'gemini-api-integration', 'mcp-development'],
                'hire_developer_slug' => 'gen-ai',
            ],

            'gemini-api-integration' => [
                'title' => 'Gemini API Integration',
                'meta_description' => 'Google Gemini API integration — multimodal AI features (text, image, video) wired into your product with real cost and reliability controls.',
                'tagline' => 'Multimodal AI features — text, image, and video — built on Gemini where that\'s the right fit.',
                'quick_answer' => 'Gemini API integration means building AI features on Google\'s Gemini models, which are natively multimodal — handling text, images, and video within the same model. DuCodes integrates Gemini specifically for use cases that benefit from that multimodal capability, alongside the standard cost, reliability, and fallback guardrails we build for any LLM integration.',
                'intro' => [
                    'Gemini\'s particular strength is native multimodality — analyzing an image, a video, or a document alongside text in the same request, without a separate specialized model for each media type. We integrate Gemini where that actually matters: visual inspection tasks, video content analysis, or workflows that mix text and image input in ways a text-only model can\'t handle.',
                    'Beyond the multimodal use cases, the integration work is the same discipline we apply to any LLM provider: careful prompt and schema design, rate limit and retry handling, cost monitoring, and a defined fallback for when the API doesn\'t respond as expected.',
                ],
                'why_ducodes' => [
                    ['title' => 'Used where multimodality is the actual requirement', 'body' => 'Image, video, or mixed-media analysis is where Gemini\'s design gives a real advantage — we\'ll recommend it specifically for those cases, not as a default.'],
                    ['title' => 'Google Cloud ecosystem integration', 'body' => 'When a project already runs on Google Cloud, we can integrate Gemini alongside existing infrastructure (storage, Vertex AI) rather than as an isolated add-on.'],
                    ['title' => 'Same reliability guardrails as any provider', 'body' => 'Rate limiting, retries, and cost monitoring are built in regardless of which model is doing the work.'],
                    ['title' => 'Honest model comparison', 'body' => 'If GPT or Claude is genuinely a better fit for your specific task, we\'ll say so rather than defaulting to whichever provider we integrated most recently.'],
                ],
                'process' => [
                    ['title' => 'Scope the use case', 'body' => 'Whether the task genuinely needs multimodal input, and what accuracy/latency/cost tradeoffs matter.'],
                    ['title' => 'Design the integration', 'body' => 'Prompt and schema design for the specific mix of text, image, or video input involved.'],
                    ['title' => 'Build with guardrails', 'body' => 'Rate limiting, retries, and cost monitoring built in from the start.'],
                    ['title' => 'Test against real media', 'body' => 'Your actual images, documents, or video, not stock examples, before going to production.'],
                    ['title' => 'Monitor after launch', 'body' => 'Usage and accuracy tracked against real traffic once live.'],
                ],
                'tech_stack' => ['Google Gemini API', 'Vertex AI (where relevant)', 'Multimodal prompt design', 'Python / Node.js', 'Laravel integration layers'],
                'related' => ['openai-integration', 'claude-api-integration', 'voice-ai-development'],
                'hire_developer_slug' => 'gen-ai',
            ],

            'llm-development' => [
                'title' => 'LLM Development',
                'meta_description' => 'Large language model development — prompt engineering, evaluation, and choosing the right model for the task, not just wiring up an API call.',
                'tagline' => 'The unglamorous, essential part of LLM features: evaluation, prompt design, and picking the right model for the job.',
                'quick_answer' => 'LLM development is the work of building reliable features on top of large language models — prompt design, output evaluation, choosing between models and providers, and deciding when retrieval, fine-tuning, or a simpler approach is the right tool. DuCodes treats this as an engineering discipline with its own testing and iteration cycle, not a one-time prompt written and forgotten.',
                'intro' => [
                    'Behind every working LLM feature is a body of unglamorous work: prompts that get iterated against real inputs, an evaluation process that catches regressions when a prompt or model changes, and a deliberate choice about which model actually fits the task\'s accuracy, latency, and cost requirements. We treat that as core engineering, not an afterthought around an API call.',
                    'This includes selecting and comparing models (OpenAI, Anthropic, Gemini, and open-source options where self-hosting makes sense), designing prompts and output schemas, and building the evaluation harness that tells you when a change actually improved things versus just felt like it did.',
                ],
                'why_ducodes' => [
                    ['title' => 'Evaluation, not vibes', 'body' => 'We test prompt and model changes against a real set of inputs with expected outputs, rather than judging quality by a handful of manual spot checks.'],
                    ['title' => 'Model choice based on your requirements', 'body' => 'We\'ll recommend the model (or combination of models) that fits your actual accuracy, latency, and cost needs — not whichever is most talked about.'],
                    ['title' => 'Prompts treated as versioned, tested code', 'body' => 'Prompt changes go through the same review and testing discipline as application code, since a small wording change can meaningfully shift output quality.'],
                    ['title' => 'Knows when NOT to use an LLM', 'body' => 'Some parts of a workflow are more reliably handled by deterministic code — we\'ll say so rather than routing everything through a model by default.'],
                ],
                'process' => [
                    ['title' => 'Define the task and success criteria', 'body' => 'What does a correct output actually look like, and what error rate is acceptable?'],
                    ['title' => 'Model & approach selection', 'body' => 'Comparing models and techniques (prompting, RAG, fine-tuning) against your actual requirements.'],
                    ['title' => 'Build the evaluation harness', 'body' => 'A real test set so future changes can be measured, not just guessed at.'],
                    ['title' => 'Iterate on prompts and pipeline', 'body' => 'Structured iteration against the evaluation set, not ad hoc tweaking.'],
                    ['title' => 'Deploy & monitor drift', 'body' => 'Ongoing tracking, since model updates and changing usage patterns can shift output quality over time.'],
                ],
                'tech_stack' => ['OpenAI / Anthropic / Gemini APIs', 'Python', 'LangChain', 'Evaluation frameworks', 'Open-source models (where self-hosting fits)'],
                'related' => ['rag-development', 'ai-development', 'openai-integration'],
                'hire_developer_slug' => 'gen-ai',
            ],

            'voice-ai-development' => [
                'title' => 'Voice AI Development',
                'meta_description' => 'Voice AI development — speech-to-text, text-to-speech, and real-time voice agents built for support, IVR replacement, and hands-free workflows.',
                'tagline' => 'Voice agents and speech features that handle real conversations, not just scripted prompts.',
                'quick_answer' => 'Voice AI development is building applications that understand and respond to spoken language — voice agents for customer support, IVR replacement, transcription, and hands-free workflows — combining speech-to-text, an LLM for understanding and response, and text-to-speech, often in real time. DuCodes builds these pipelines with the same escalation and fallback discipline we apply to text-based AI features.',
                'intro' => [
                    'Voice adds real constraints text-based AI doesn\'t have: responses need to happen in near real time, speech recognition needs to handle accents and background noise, and a voice agent that gets confused mid-call needs a graceful way to hand off to a human, not a dead silence. We build voice AI features — call-handling agents, voice-driven internal tools, transcription and summarization pipelines — around those constraints specifically.',
                    'This typically combines a speech-to-text layer, an LLM handling understanding and response generation, and text-to-speech for the reply, wired together with the latency budget a real conversation actually requires.',
                ],
                'why_ducodes' => [
                    ['title' => 'Designed for real-time constraints', 'body' => 'Latency budgets for a natural-feeling conversation are part of the architecture decision from the start, not discovered after the demo feels sluggish.'],
                    ['title' => 'Graceful human handoff', 'body' => 'A voice agent that\'s uncertain or stuck gets a defined path to transfer to a person, the same discipline we apply to chat-based agents.'],
                    ['title' => 'Built for real speech, not clean demo audio', 'body' => 'Accents, background noise, and interruptions get accounted for in testing, not just clear studio-quality sample audio.'],
                    ['title' => 'Integrated with your existing phone/support stack', 'body' => 'Voice agents connect into your actual telephony or support system rather than existing as a standalone demo.'],
                ],
                'process' => [
                    ['title' => 'Scope the conversation', 'body' => 'What the voice agent should handle end-to-end, and where it needs to hand off to a human.'],
                    ['title' => 'Choose the speech stack', 'body' => 'Speech-to-text and text-to-speech providers selected for your language, accent, and latency requirements.'],
                    ['title' => 'Build the conversation logic', 'body' => 'LLM-driven understanding and response, tuned against real (or realistic) call transcripts.'],
                    ['title' => 'Test with real audio conditions', 'body' => 'Background noise, accents, and interruptions tested explicitly, not just clean sample recordings.'],
                    ['title' => 'Deploy & monitor call quality', 'body' => 'Ongoing review of real call transcripts to catch misunderstandings and tune the system after launch.'],
                ],
                'tech_stack' => ['Speech-to-text (Whisper, Deepgram)', 'Text-to-speech (ElevenLabs, Google/Azure TTS)', 'OpenAI / Anthropic / Gemini APIs', 'Telephony integration (Twilio)', 'Python / Node.js'],
                'related' => ['ai-agent-development', 'ai-automation-services', 'llm-development'],
                'hire_developer_slug' => 'gen-ai',
            ],

            'ai-automation-services' => [
                'title' => 'AI Automation Services',
                'meta_description' => 'AI-powered automation for repetitive business processes — document handling, data entry, and back-office workflows — not just chatbots.',
                'tagline' => 'Automating the repetitive back-office work that AI is actually reliable enough to handle today.',
                'quick_answer' => 'AI automation services means using AI — often combined with traditional rules-based automation — to handle repetitive business processes: document processing, data entry between systems, report generation, and workflow triage. DuCodes scopes these projects around a specific, measurable task with a known error tolerance, rather than a vague promise to "automate operations with AI."',
                'intro' => [
                    'The most reliable AI automation work isn\'t a flashy standalone chatbot — it\'s AI handling a specific, repetitive step inside an existing process: extracting data from incoming documents, categorizing and routing support tickets, reconciling records between two systems, drafting a first version of a routine report. These are places where a defined error tolerance and a human review step make AI genuinely useful today.',
                    'We often combine an LLM with traditional rules-based logic — using AI for the parts that need language understanding or judgment, and deterministic code for the parts that don\'t, rather than routing an entire workflow through a model when only part of it actually benefits.',
                ],
                'why_ducodes' => [
                    ['title' => 'Scoped to one real bottleneck', 'body' => 'We start from the specific manual task that\'s actually costing your team time, not a general "automate everything" mandate.'],
                    ['title' => 'AI where it helps, rules where they\'re more reliable', 'body' => 'We combine LLMs with deterministic logic deliberately — using AI for judgment and language understanding, and code for everything that doesn\'t need it.'],
                    ['title' => 'Human review built in, where accuracy matters', 'body' => 'For processes with real consequences, we build a review step rather than letting automation run fully unsupervised from day one.'],
                    ['title' => 'Measured, not assumed, to be working', 'body' => 'We track error rates and time saved against the manual process it replaced, so the ROI is a real number, not a guess.'],
                ],
                'process' => [
                    ['title' => 'Identify the bottleneck', 'body' => 'The specific repetitive task costing your team the most time, and its current error tolerance.'],
                    ['title' => 'Design the automation', 'body' => 'What\'s handled by AI, what\'s handled by deterministic rules, and where a human reviews the output.'],
                    ['title' => 'Build & integrate', 'body' => 'Wired into your existing systems (CRM, ERP, document storage) rather than as a standalone tool.'],
                    ['title' => 'Test against real historical cases', 'body' => 'Run against real past examples to measure accuracy before it touches live work.'],
                    ['title' => 'Deploy & measure impact', 'body' => 'Tracking time saved and error rate against the manual baseline after launch, not just assuming it worked.'],
                ],
                'tech_stack' => ['OpenAI / Anthropic / Gemini APIs', 'Python', 'RPA / workflow tools where relevant', 'Existing CRM/ERP APIs', 'Document processing (OCR + LLM extraction)'],
                'related' => ['ai-agent-development', 'crewai-development', 'custom-software-development'],
                'hire_developer_slug' => 'gen-ai',
            ],
        ];
    }
}
